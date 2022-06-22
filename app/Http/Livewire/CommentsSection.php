<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Yoeunes\Toastr\Facades\Toastr;

class CommentsSection extends Component
{

    public Post $post;
    public $comment;

    protected $rules = [

        'comment' => 'required|min:4'
    ];

    
    public function postComment()
    {
        $this->validate();

        sleep(1);

        $this->post->comments()->create([

            'user_id' => auth()->id(),
            'body' => $this->comment
        ]);

        $this->comment = '';

        $this->post->refresh();

        Toastr()->success('Your comment is posted!');

    }

    public function render()
    {
        return view('livewire.comments-section');
    }
}
