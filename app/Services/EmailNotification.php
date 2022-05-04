<?php

namespace App\Services;

use App\Mail\FollowMail;
use App\Models\Follow;
use Illuminate\Support\Facades\Mail;

class EmailNotification{

    private $recipient;
    private $sender;

    public function __construct($sender)
    {
        $this->sender = $sender;

        $this->sendEmail();
    }

    public function sendEmail()
    {
        
        $collection = Follow::join('users', 'users.id', '=', 'follows.follower_id')->where('follows.user_id', auth()->id())->get();
        
        foreach ($collection as $key => $this->recipient) {

            Mail::to($this->recipient['email'])->send(new FollowMail($this->sender));
            
        }
 
        if (Mail::failures() != 0) {
            return "Email sent!";
        }

        return "Oops! failed to send email";
    }

}