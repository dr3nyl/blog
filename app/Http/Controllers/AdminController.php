<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [

            'posts' => Post::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        
       $attribute = request()->validate([

            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attribute['user_id'] = auth()->id();
        $attribute['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attribute);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {

        $attribute = request()->validate([

            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if ( isset($attribute['thumbnail']) ) {
            $attribute['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        

        $post->update($attribute);

        return back()->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return back()->with('success', 'Post deleted!');

    }

}
