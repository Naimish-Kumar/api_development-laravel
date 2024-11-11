<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategories::with('categories')->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Subcategories::create($request->all());
        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function show(Subcategories $subcategory)
    {
        return view('subcategories.show', compact('subcategory'));
    }

    public function edit(Subcategories $subcategory)
    {
        $categories = Categories::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategories $subcategory)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subcategories,name,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory->update($request->all());
        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategories $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
