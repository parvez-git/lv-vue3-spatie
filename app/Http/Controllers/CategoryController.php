<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Backend/Blog/Categories/Index', 
        [
            'categories' => Category::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Backend/Blog/Categories/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:categories',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $imageName = $slug.'.'.$request->image->extension();  
        $request->file('image')->storeAs('images/categories', $imageName);

        Category::create([
            'name'  => $request->name,
            'slug'  => $slug,
            'image' => $imageName
        ]);

        return Redirect::route('dashboard.categories.index')
            ->with(['success' => 'Category created.']);
    }

    public function edit(Category $category)
    {
        return Inertia::render('Backend/Blog/Categories/Edit', 
        [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:categories,name,'.$category->id,
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $imageName = $slug.'.'.$request->image->extension();  
            $request->file('image')->storeAs('images/categories', $imageName);
        } else {
            $imageName = $category->image;
        }

        $category->update([
            'name'  => $request->name,
            'slug'  => $slug,
            'image' => $imageName
        ]);

        return Redirect::route('dashboard.categories.index')
            ->with(['success' => 'Category Updated.']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Storage::disk('public')->delete('images/categories/'.$category->image);
        return Redirect::back()->with('success', 'Category deleted.');
    }
}
