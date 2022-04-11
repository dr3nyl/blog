<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter{

    
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }
    public function subscribe(string $email)
    {
    
        return $this->client->lists->addListMember(config('services.mailchimp.list_id'), [
            "email_address" => $email,
            "status" => "subscribed",
        ]);

    }

}