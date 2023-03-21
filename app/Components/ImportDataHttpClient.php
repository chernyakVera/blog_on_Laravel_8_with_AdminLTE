<?php


namespace App\Components;


use GuzzleHttp\Client;

class ImportDataHttpClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://jsonplaceholder.typicode.com/',
            // You can set any number of default request options.
            'timeout'  => 5.0,
        ]);
    }
}
