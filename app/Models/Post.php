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

            $query->when($filters['search'], function ($query, $search) {

                $query
                    ->where('title', 'like', '%'. $search .'%')
                    ->orWhere('body', 'like', '%'. $search .'%');
            });
        }
        
       if (isset($filters['category'])) {

            $query->when($filters['category'], fn($query, $category) => 

                $query->whereHas('category', fn($query) =>
                
                    $query->where('slug', $category)
                )
            );

        }
      
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
