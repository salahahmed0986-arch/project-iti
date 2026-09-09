<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class BookComparisonController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.comparison', compact('books'));
    }

    public function compare(Request $request)
    {
        try {

            $request->validate([
                'book1' => 'required|different:book2',
                'book2' => 'required',
            ]);

            $book1 = Book::with('category')->findOrFail($request->book1);
            $book2 = Book::with('category')->findOrFail($request->book2);

            $prompt = "
            Compare these two books for the user.

            BOOK 1:
            Title: {$book1->title}
            Author: {$book1->author}
            Category: " . ($book1->category->name ?? 'No Category') . "
            Description: " . ($book1->description ?? 'No description') . "

            BOOK 2:
            Title: {$book2->title}
            Author: {$book2->author}
            Category: " . ($book2->category->name ?? 'No Category') . "
            Description: " . ($book2->description ?? 'No description') . "

            Compare them clearly using:
            1. Main topic
            2. Difficulty
            3. What the reader can learn
            4. Which book is better for beginners
            5. Which book is better for advanced learners
            6. Final recommendation

            Only use the information provided above.
            ";

            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',

                'messages' => [
                    [
                        'role' => 'system',
                        'content' =>
                            'You are an AI book comparison assistant for a library.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
            ]);

            return response()->json([
                'reply' => $result->choices[0]->message->content
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}