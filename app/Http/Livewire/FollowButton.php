<?php

namespace App\Http\Livewire;

use App\Models\Follow;
use App\Models\Post;
use Livewire\Component;

class FollowButton extends Component
{
    public $postAuthorId;
    public $authorName;
    public $isFollowed;
    public Post $post;
    public Follow $follow;

    public $checkIfFollowed;
    public function mount(){

        $this->postAuthorId = $this->post->author->id;
        $this->authorName = $this->post->author->name;
        
        $this->checkIfFollowed = $this->post->author->followedBy(auth()->user());
    }

    public function follow()
    {

        Follow::create([
            'user_id' => $this->postAuthorId,
            'follower_id' => auth()->id()
        ]);
        $this->isFollowed = (bool) true;


        session()->flash('success', 'Followed' . $this->authorName);

    }

    public function unfollow()
    {
        Follow::query()
    ->where([
        [
            'user_id', '=', $this->postAuthorId,
        ],
        [
            'follower_id', '=', auth()->id()
        ]
    ])
    ->delete();
        $this->isFollowed = (bool) false;


        session()->flash('success', 'Followed' . $this->authorName);

    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
