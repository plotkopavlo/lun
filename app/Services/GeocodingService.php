<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Class GeocodingService
 * @package App\Services
 */
class GeocodingService
{
    const NO_RESULTS = "ZERO_RESULTS";

    private $baseURL = 'http://maps.google.com/maps/api/geocode/json';

    /**@var Client **/
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseURL
        ]);
    }

    /**
     * @param $address
     * @return object
     */
    public function getCoordinatesByAddress($address)
    {
        $coordinates = (object) [
            'lat' => 0,
            'lon' => 0
        ];

        $response = $this->client->request('GET', '', ['query' => [
            'address' => $address
        ]]);

        $code = $response->getStatusCode();

        if ($code != 200) {
            return $coordinates;
        }

        $body = $response->getBody();

        $json = json_decode($body, true);

        if ($json['status'] != self::NO_RESULTS) {
            $coordinates->lat = $json['results'][0]['geometry']['location']['lat'];
            $coordinates->lon = $json['results'][0]['geometry']['location']['lng'];
        }

        return $coordinates;
    }
}