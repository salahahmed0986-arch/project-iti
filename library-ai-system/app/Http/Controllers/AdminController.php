<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $booksCount = Book::count();

        $usersCount = User::count();

        $categoriesCount = Category::count();

        $lowStockBooks = Book::where('available_copies', '<=', 2)
            ->with('category')
            ->get();

        $booksByCategory = Category::withCount('books')->get();

        return view('admin.dashboard', compact(
            'booksCount',
            'usersCount',
            'categoriesCount',
            'lowStockBooks',
            'booksByCategory'
        ));
    }
}