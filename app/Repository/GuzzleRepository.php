<?php
namespace App\Repository;
use GuzzleHttp\Client;


/**
 * Created by PhpStorm.
 * User: daisu
 * Date: 19/09/2019
 * Time: 01:16 PM
 */

class GuzzleRepository {

    private $uri;
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://atomic.incfile.com/',
        ]);
    }

    public function sendRequest() : string
    {
        $response = $this->client->post($this->uri, [
            'debug' => FALSE,
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ]
        ]);
        $body = $response->getBody()->getContents();
        return $body;
    }

    public function setUri($uri){
        $this->uri = $uri;
    }


}