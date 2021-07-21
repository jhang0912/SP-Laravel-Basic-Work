<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ShortUrlService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function createShortUrl()
    {
        $data = [
            "url" => 'http://localhost/laravel/Homework/public/home',
            "externalId" => "customer_test_1"
        ];

        $response = $this->client->request(
            'POST',
            "https://api.pics.ee/v1/links/?access_token=20f07f91f3303b2f66ab6f61698d977d69b83d64",
            [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data)
            ]
        );

        $contents = $response->getBody()->getContents();
        $contents = json_decode($contents);

        return $contents->data->picseeUrl;

        return $response;
    }
}
