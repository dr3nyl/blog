<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
       // return Cache::rememberForever('posts.all', function () {

            return collect($file = File::files(resource_path("views/posts")))
                ->map( fn($file) => YamlFrontMatter::parseFile($file))
                ->map( fn($documents) => new Post(
                        $documents->title, 
                        $documents->excerpt, 
                        $documents->date, 
                        $documents->body(),
                        $documents->slug
                    ))
                ->sortByDesc('Date');
                    
       // });
      
        
    // =======SAME FUNCTIONALITY TO CREATE ARRAY AND MAP=================
        // $posts = array_map( function ($file){

        //     $documents = YamlFrontMatter::parseFile($file);

        //      return new Post(

        //         $documents->title, 
        //         $documents->excerpt, 
        //         $documents->date, 
        //         $documents->body(),
        //         $documents->slug
        //     );

        // }, $files);
    

    // =======SAME FUNCTIONALITY TO CREATE ARRAY AND MAP=================
        // foreach ( $files as $file) {

        //     $documents = YamlFrontMatter::parseFile($file);

        //     $posts[] = new Post(
        //         $documents->title, 
        //         $documents->excerpt, 
        //         $documents->date, 
        //         $documents->body(),
        //         $documents->slug
        //     );
        // }
    }
    
    public static function find($slug)
    {

       $post = static::all()->firstWhere('slug', $slug);

        if( !$post )
        {
            throw new ModelNotFoundException();
        }
    
        return $post;
    }
    

}
