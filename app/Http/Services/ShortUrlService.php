<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ShortUrlService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function createShortUrl()
    {
        try {
            $data = [
                "url" => 'http://localhost/laravel/Homework/public/home',
                "externalId" => "customer_test_1"
            ];

            Log::channel('shortUrl')->info("requestData", ['data' => $data]);

            $response = $this->client->request(
                'POST',
                "https://api.pics.ee/v1/links/?access_token=20f07f91f3303b2f66ab6f61698d977d69b83d64",
                [
                    'headers' => ['Content-Type' => 'pplication/json'],
                    'body' => json_encode($data)
                ]
            );

            $contents = $response->getBody()->getContents();

            Log::channel('shortUrl')->info('responseDate', ['data' => $contents]);

            $contents = json_decode($contents);

            return $contents->data->picseeUrl;

            return $response;
        } catch (\Throwable $th) {
            report($th);
            
            Log::channel('shortUrl')->error("error", ['message' => $th->getMessage()]);

            return view('error', [
                'message' => 'SORRY~這個頁面出錯了(☉д⊙)'
            ]);
        }
    }
}
