<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [

            'posts' => Post::orderByDesc('created_at')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        
        Post::create(array_merge($this->validatePost(), [
                    'user_id' => auth()->id(), 
                    'thumbnail' => request()->file('thumbnail')->store('thumbnails')
                    ]));

        // $email = new EmailNotification(auth()->user()->email);
        // dd($email);
        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        
        $attribute = $this->validatePost($post);

        if ($attribute['thumbnail'] ?? false) {
            $attribute['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        
        $post->update($attribute);

        return redirect('/admin/posts')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return back()->with('success', 'Post deleted!');

    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'status' => 'required',
            'user_id' => 'required'
        ]);
    }


}
