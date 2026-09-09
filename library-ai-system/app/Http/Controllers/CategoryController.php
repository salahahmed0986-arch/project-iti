<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
        ]);

        return redirect('/categories');
    }
    public function edit($id)
{
    $category = Category::findOrFail($id);

    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $request->validate([
        'name' => 'required|unique:categories,name,' . $id,
    ]);

    $category->update([
        'name' => $request->name,
        'slug' => \Illuminate\Support\Str::slug($request->name),
    ]);

    return redirect('/categories');
}
public function destroy($id)
{
    $category = Category::findOrFail($id);

    $category->delete();

    return redirect('/categories');
}
}