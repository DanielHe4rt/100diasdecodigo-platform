<?php

namespace App\Providers\Socialstream;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;

class TwitterProvider extends \Laravel\Socialite\Two\TwitterProvider
{
    public function getAccessTokenResponse($code)
    {
        $authkey = base64_encode(sprintf('%s:%s',
            config('services.twitter.client_id'),
            config('services.twitter.client_secret'),
        ));
        $tokenFields = $this->getTokenFields($code);
        $options = [
            RequestOptions::HEADERS => [
                'Authorization' => 'Basic ' . $authkey,
                'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
            ],
            RequestOptions::JSON => $tokenFields,
        ];

        $response = $this->getHttpClient()->post($this->getTokenUrl(), $options);

        return json_decode($response->getBody(), true);
    }
}
