<?php

namespace App\Services;

use App\Mail\FollowMail;
use App\Mail\subscriberMail;
use App\Models\Follow;
use Illuminate\Support\Facades\Mail;

class EmailNotification{


    private $sender;

    public function __construct($sender)
    {
        $this->sender = $sender;

    }

    public function sendEmail()
    {
        
        $data = Follow::leftJoin('users', 'users.id', '=', 'follows.follower_id')
                            ->where('user_id', auth()->id())
                            ->get(['email']);
        

        foreach ($data as $key => $recipient) {

            Mail::to($recipient['email'])->send(new subscriberMail());

            
        }

        if (Mail::failures() != 0) {
            return "Email sent!";
        }
    }

}