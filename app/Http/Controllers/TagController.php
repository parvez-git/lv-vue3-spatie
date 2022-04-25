<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TagController extends Controller
{
    public function index()
    {
        return Inertia::render('Backend/Blog/Tags/Index', 
        [
            'tags' => Tag::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Backend/Blog/Tags/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:tags'
        ]);

        Tag::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name, '-'),
        ]);

        return Redirect::route('dashboard.tags.index')
            ->with(['success' => 'Tag created.']);
    }

    public function edit(Tag $tag)
    {
        return Inertia::render('Backend/Blog/Tags/Edit', 
        [
            'tag' => $tag
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:tags,name,'.$tag->id
        ]);

        $tag->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name, '-'),
        ]);

        return Redirect::route('dashboard.tags.index')
            ->with(['success' => 'Tag Updated.']);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return Redirect::back()->with('success', 'Tag deleted.');
    }
}
