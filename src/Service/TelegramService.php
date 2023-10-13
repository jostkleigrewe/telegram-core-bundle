<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramService
{
    public function __construct(
        private readonly string $apikey,
        private readonly HttpClientInterface $httpClient
    ) {}

    public function sendMessage(string $message): array
    {

//        $response = $this->httpClient->request(
//            'POST',
//            'https://api.openai.com/v1/chat/completions',
//            [
//                'headers' => [
//                    'Authorization' => 'Bearer '.$this->apikey,
//                    'Content-Type' => 'application/json',
//                ],
//                'json' => [
//                    "model" => "gpt-4",
//                    "messages" => [
//                        [
//                            "role"=> "user",
//                            "content"=> $message
//                        ]
//                    ],
//                    "temperature" => 0.7,
//                    "max_tokens" => 256,
////                    top_p=1,
////                    frequency_penalty=0,
////                    presence_penalty=0
//                ],
//            ]
//        );
////            dump($this->apikey);
////            dump($response);
////            dump($response->getContent());
////die;

        return $response->toArray();
    }


}