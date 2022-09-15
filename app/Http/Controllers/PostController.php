<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\NewsApi;
use Illuminate\Support\Facades\Cookie;


class PostController extends Controller
{
    
    public function index()
    {
        $articles = new NewsApi();

        return view('posts.index', [
        
            'posts' => Post::latest()->where('status', 'Published')
                     ->filter(request(['search', 'category', 'author']))
                     ->simplePaginate(9)->withQueryString(), 

            'articles' => $articles->getArticles()->articles,  // added api news in home page
            
            'articleTitle' => $articles::$subject

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
