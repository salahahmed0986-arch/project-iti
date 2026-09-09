<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        try {

            // Validate message
            $request->validate([
                'message' => 'required|string',
            ]);

            // Logged-in user
            $user = auth()->user();

            // User role
            $role = $user->role;

            // User message
            $message = strtolower($request->message);

            /*
            |--------------------------------------------------------------------------
            | ADMIN ONLY QUESTIONS
            |--------------------------------------------------------------------------
            */

            $adminKeywords = [
                'users',
                'user count',
                'number of users',
                'how many users',
                'statistics',
                'stats',
                'admin',
                'low stock',
                'low availability',
                'available copies',
                'most books',
                'largest category',
                'books per category',
                'total books',
                'total categories',
                'number of books',
                'how many books',
            ];

            $isAdminQuestion = false;

            foreach ($adminKeywords as $keyword) {
                if (str_contains($message, $keyword)) {
                    $isAdminQuestion = true;
                    break;
                }
            }

            /*
            |--------------------------------------------------------------------------
            | BLOCK NORMAL USERS
            |--------------------------------------------------------------------------
            */

            if ($role !== 'admin' && $isAdminQuestion) {

                return response()->json([
                    'reply' => '🚫 Sorry, you do not have permission to access administrative information.'
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | GET BOOKS
            |--------------------------------------------------------------------------
            */

            $books = Book::with('category')->get();

            $booksText = '';

            foreach ($books as $book) {

                $booksText .= "
                Title: {$book->title}
                Author: {$book->author}
                Category: " . ($book->category->name ?? 'No Category') . "
                Description: " . ($book->description ?? 'No description') . "
                Available Copies: {$book->available_copies}
                -------------------------
                ";
            }

            /*
            |--------------------------------------------------------------------------
            | SYSTEM MESSAGE
            |--------------------------------------------------------------------------
            */

            if ($role === 'admin') {

                /*
                |--------------------------------------------------------------------------
                | ADMIN STATISTICS
                |--------------------------------------------------------------------------
                */

                $booksCount = Book::count();

                $usersCount = User::count();

                $categoriesCount = Category::count();

                $lowStockBooks = Book::where(
                    'available_copies',
                    '<=',
                    2
                )->with('category')->get();

                $lowStockText = '';

                foreach ($lowStockBooks as $book) {

                    $lowStockText .= "
                    {$book->title}
                    - Available Copies: {$book->available_copies}
                    - Category: " . ($book->category->name ?? 'No Category') . "
                    ";
                }

                if ($lowStockText === '') {
                    $lowStockText = 'There are no low-stock books.';
                }

                $booksByCategory = Category::withCount('books')->get();

                $categoryText = '';

                foreach ($booksByCategory as $category) {

                    $categoryText .= "
                    {$category->name}: {$category->books_count} books
                    ";
                }

                $systemMessage = "
                You are an AI assistant for a Library Management System.

                The current user is an ADMIN.

                The admin can ask about:
                - Books
                - Categories
                - Users
                - Library statistics
                - Book availability
                - Recommendations
                - Library management

                Here are the current library statistics:

                Total Books: {$booksCount}

                Total Users: {$usersCount}

                Total Categories: {$categoriesCount}

                Books By Category:
                {$categoryText}

                Low Stock Books:
                {$lowStockText}

                Here are the books currently available:

                {$booksText}

                Use these real database values when answering
                administrative questions.
                Do not invent statistics.
                ";

            } else {

                /*
                |--------------------------------------------------------------------------
                | NORMAL USER
                |--------------------------------------------------------------------------
                */

                $systemMessage = "
                You are an AI assistant for a Library Management System.

                The current user is a NORMAL USER.

                The user can ask about:
                - Books
                - Book information
                - Book recommendations
                - Categories
                - Learning topics
                - General library questions

                The user cannot access:
                - Other users personal information
                - Admin information
                - Administrative statistics
                - Administrative operations

                If the user asks for restricted information,
                politely explain that they do not have permission.

                Here are the books currently available:

                {$booksText}

                Use the book information above when answering questions.
                Do not invent book information.
                ";
            }

            /*
            |--------------------------------------------------------------------------
            | SEND TO OPENAI
            |--------------------------------------------------------------------------
            */

            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',

                'messages' => [

                    [
                        'role' => 'system',
                        'content' => $systemMessage
                    ],

                    [
                        'role' => 'user',
                        'content' => $request->message
                    ],

                ],
            ]);

            /*
            |--------------------------------------------------------------------------
            | RETURN RESPONSE
            |--------------------------------------------------------------------------
            */

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