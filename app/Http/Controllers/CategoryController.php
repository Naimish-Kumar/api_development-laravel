<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Categories::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    // Show a specific category
    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show form to edit a category
    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update a category
    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
