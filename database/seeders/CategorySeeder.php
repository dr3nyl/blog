<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'name' => 'hiking',
                'slug' => 'hike-life'
            ],
            [
                'name' => 'tour',
                'slug' => 'tour-adventure'
            ],
            [
                'name' => 'fitness',
                'slug' => 'my-fitness'
            ],
            [
                'name' => 'gaming',
                'slug' => 'game-life'
            ],
            [
                'name' => 'music',
                'slug' => 'music-is-life'
            ],

        ];


        foreach ($categories as $key => $category) {
            
            Category::create($category);
        }
    }
}
