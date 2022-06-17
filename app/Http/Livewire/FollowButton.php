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
    public $txt;

    public function mount(){

        $this->postAuthorId = $this->post->author->id;
        $this->authorName = $this->post->author->name;
        $this->isFollowed = (bool) $this->post->author->followedBy(auth()->user());
    }

    public function follow()
    {

        Follow::create([
            'user_id' => $this->postAuthorId,
            'follower_id' => auth()->id()
        ]);;

        session()->flash('success', 'Followed' . $this->authorName);

    }

    public function unfollow()
    {

        # code here..
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
