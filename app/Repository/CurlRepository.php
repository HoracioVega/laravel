<?php
namespace App\Repository;
use Mockery\Exception;

/**
 * Created by PhpStorm.
 * User: daisu
 * Date: 19/09/2019
 * Time: 01:16 PM
 */

class CurlRepository {

    private $uri;
    private $client;

    public function __construct()
    {
        $this->client = curl_init();
    }

    protected function setDefaultOptions() : array
    {
        return array(
            CURLOPT_URL            => 'https://atomic.incfile.com/'.$this->uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_POSTFIELDS     => '{}',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_ENCODING       => '',
            CURLOPT_TIMEOUT        => 30,
        );
    }

    public function sendRequest() : string
    {
        curl_setopt_array($this->client,$this->setDefaultOptions());

        try{
            return curl_exec($this->client);
        }catch(Exception $exception){
            return $exception->getMessage();
        }
    }

    public function setUri($uri){
        $this->uri = $uri;
    }

    public function closeCurl(){
        return curl_close($this->client);
    }


}