<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;

class RecommendationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $books = Book::with('category')->get();

        $userInterests = $this->prepareWords($user->interests);
        $favoriteTopics = $this->prepareWords($user->favorite_topics);
        $preferredCategories = $this->prepareWords($user->preferred_categories);
        $skills = $this->prepareWords($user->skills);
        $learningGoals = $this->prepareWords($user->learning_goals);

        $recommendations = [];

        foreach ($books as $book) {

            $bookText = strtolower(
                $book->title . ' ' .
                $book->author . ' ' .
                ($book->description ?? '') . ' ' .
                ($book->category->name ?? '')
            );

            $score = 0;

            // Interests
            foreach ($userInterests as $word) {
                if (Str::contains($bookText, $word)) {
                    $score += 20;
                }
            }

            // Favorite Topics
            foreach ($favoriteTopics as $word) {
                if (Str::contains($bookText, $word)) {
                    $score += 20;
                }
            }

            // Preferred Categories
            foreach ($preferredCategories as $word) {
                if (Str::contains(
                    strtolower($book->category->name ?? ''),
                    $word
                )) {
                    $score += 30;
                }
            }

            // Skills
            foreach ($skills as $word) {
                if (Str::contains($bookText, $word)) {
                    $score += 10;
                }
            }

            // Learning Goals
            foreach ($learningGoals as $word) {
                if (Str::contains($bookText, $word)) {
                    $score += 10;
                }
            }

            // Maximum 100%
            $score = min($score, 100);

            $recommendations[] = [
                'book' => $book,
                'score' => $score,
            ];
        }

        // Highest match first
        usort($recommendations, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        return view(
            'recommendations.index',
            compact('recommendations')
        );
    }

    private function prepareWords($data)
    {
        if (is_array($data)) {
            return array_filter(
                array_map(
                    fn($item) => strtolower(trim($item)),
                    $data
                )
            );
        }

        if (is_string($data)) {
            return array_filter(
                preg_split('/[\s,]+/', strtolower(trim($data)))
            );
        }

        return [];
    }
}