<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class FollowController extends Controller
{
    
    public function store(Request $request)
    {   

       $attributes = request()->validate([
            'user_id' => ['required', ValidationRule::unique('follows', 'user_id')],
            'follower_id' => ['required']
        ]);

        Follow::create($attributes, [
            'user_id' => request()->user_id,
            'follower_id' => auth()->id()
        ]);
        
        return back()->with('success', 'Followed');
    }

    public function destroy(Follow $follow)
    {

        Follow::where('id', $follow->id)->delete();

        return back()->with('success', 'Unfollowed author!');
    }
}
