<?php
namespace Rmfloris\BricklinkApi\client;

class ClientResponse
{
    public $rawRequest;
    public $rawResponse;

    public function __construct($curlResource, $apiResponse)
    {
        $this->rawResponse = $apiResponse;
        $this->rawRequest = curl_getinfo($curlResource)['url'];
    }
} 