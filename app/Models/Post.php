<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


   protected $with = ['author', 'category'];
   protected $guarded = ['id'];


   public function scopeFilter($query, array $filters)
   {

        if (isset($filters['search'])) {

            $query->when($filters['search'], fn ($query, $search) =>

                $query->where(fn($query) => 
                $query
                    ->where('title', 'like', '%'. $search .'%')
                    ->orWhere('body', 'like', '%'. $search .'%'))
            );
        }
        
       if (isset($filters['category'])) {

            $query->when($filters['category'], fn($query, $category) => 

                $query->whereHas('category', fn($query) =>
                
                    $query->where('slug', $category)
                )
            );

        }

        if (isset($filters['author'])) {

            $query->when($filters['author'], fn($query, $author) => 

                $query->whereHas('author', fn($query) =>
                
                    $query->where('username', $author)
                )
            );

        }

      
   }

   public function comments()
   {

    return $this->hasMany(Comment::class);
   }

   public function category()
   {

    return $this->belongsTo(Category::class);
   }

   public function author()
   {

    return $this->belongsTo(User::class, 'user_id');
   }
   
}
