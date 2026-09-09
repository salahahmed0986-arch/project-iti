<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $books = Book::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->get();

        $categories = Category::all();

        return view(
            'books.index',
            compact('books', 'search', 'category', 'categories')
        );
    }

    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'available_copies' => 'required|integer|min:0',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'publication_date' => $request->publication_date,
            'available_copies' => $request->available_copies,
        ]);

        return redirect('/books');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'available_copies' => 'required|integer|min:0',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'publication_date' => $request->publication_date,
            'available_copies' => $request->available_copies,
        ]);

        return redirect('/books');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect('/books');
    }

    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);

        return view('books.show', compact('book'));
    }
}