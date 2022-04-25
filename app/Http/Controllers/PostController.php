<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    { 
        return Inertia::render('Backend/Blog/Posts/Index', 
        [
            'posts' => Post::with(['user','categories','tags'])
                ->filter(Request::only('search'))
                ->published()
                ->latest()
                ->paginate()
        ]);
    }

    public function create()
    {
        return Inertia::render('Backend/Blog/Posts/Create', 
        [
            'categories'    => Category::orderBy('id')->get(),
            'tags'          => Tag::orderBy('id')->get(),
        ]);
    }

    public function store(StorePostRequest $request)
    { 
        $slug = Str::slug($request->title);
        $imageName = $slug.'.'.$request->image->extension(); 
        $request->file('image')->storeAs('images/posts', $imageName);

        $post = Post::create([
            'title'     => $request->title,
            'slug'      => Str::slug($request->title, '-'),
            'body'      => $request->body,
            'published' => $request->published,
            'user_id'   => Auth::user()->id,
            'image'     => $imageName
        ]);

        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        
        return Redirect::route('dashboard.posts.index')->with('success', 'Post Created.');
    }

    public function show(Post $post)
    {
        $post = Post::published()->findOrFail($post->id);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return Inertia::render('Backend/Blog/Posts/Edit', [
            'post'                  => $post,
            'categories'            => Category::orderBy('id')->get(),
            'tags'                  => Tag::orderBy('id')->get(),
            'assaignedcategories'   => $post->categories()->pluck('category_id'),
            'assaignedtags'         => $post->tags()->pluck('tag_id')
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $slug = Str::slug($request->title);

        if ($request->image) {
            $imageName = $slug.'.'.$request->image->extension(); 
            $request->file('image')->storeAs('images/posts', $imageName);
        } else {
            $imageName = $request->image;
        }

        $post->update([
            'title'     => $request->title,
            'slug'      => $slug,
            'body'      => $request->body,
            'published' => $request->published,
            'image'     => $imageName
        ]);

        $post->categories()->sync($request->assaigncategories);
        $post->tags()->sync($request->assaigntags);

        return Redirect::route('dashboard.posts.index')->with('success', 'Post Updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        Storage::disk('public')->delete('images/posts/'.$post->image);
        return Redirect::back()->with('success', 'Post deleted.');
    }
}
