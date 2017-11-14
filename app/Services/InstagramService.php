<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Class InstagramService
 * @package App\Services
 */
class InstagramService
{

    private $baseURL     = 'https://api.instagram.com/v1/';
    private $accessToken = '6373484370.59145c5.016a09e52d14478d80d77f40f3a31c80';
    private $accessCode  = '635897edd8fc47fe8579fa4fff3088bc';

    /**@var Client */
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseURL
        ]);
    }

    /**
     * get user's information
     * @param $id
     * @return mixed|null
     */
    public function getInformationByID($id)
    {
        $url = "users/{$id}/";

        $response = $this->request($url);

        return $response;
    }

    /**
     * get user's images
     * @param $id
     * @return mixed|null
     */
    public function getImagesByID($id)
    {
        $url = "users/{$id}/media/recent/";

        $response = $this->request($url);

        return $response;
    }

    /**
     * get data, request with access token and code
     * @param $url
     * @return mixed|null
     */
    private function request($url)
    {
        $response = $this->client->request('GET', $url, ['query' => [
            'access_token' => $this->accessToken,
            'code'         => $this->accessCode
        ]]);

        $code = $response->getStatusCode();
        if ($code != 200) {
            return null;
        }

        $body = $response->getBody();
        $json = json_decode($body, true);

        return $json;
    }

}