<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class NewsApi {

    private $apiKey = '2b7a458491f3418185a9ccfe5f22133d';
    public static $subject = 'bitcoin';
    private $sortBy = 'publishedAt';


    public function getArticles(){

        $response = Http::get('https://newsapi.org/v2/everything', [
    
            'q' => self::$subject,
            'from' => now()->format('Y-m-d'),
            'sortBy' => $this->sortBy,
            'apiKey' => $this->apiKey
        ]);
    
        return json_decode($response);
    }

}
