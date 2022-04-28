<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    
    public function index()
    {
        
        return view('posts.index', [
        
            'posts' => Post::latest()->where('status', 'Published')
                     ->filter(request(['search', 'category', 'author']))
                     ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        if(Cookie::get($post->id) == '')
        {
            Cookie::queue($post->id, $post->title, 60);
            $post->incrementReadCount();
        }

        return view('posts.show', [

            'post' => $post
        
        ]);
    }

    
}
