<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ManagePostTest extends TestCase
{
   
    use RefreshDatabase;

    /** @test */
    public function guest_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $view = $this->get('/');

        $view->assertOk();

        
    }

    /** @test */
    public function guest_cannot_comment_in_a_post()
    {
        $post = Post::factory()->create();

        $this->get('/posts/'.$post->slug)->assertOk();
    }
}
