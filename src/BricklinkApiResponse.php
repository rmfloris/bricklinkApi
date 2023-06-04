<?php
namespace Rmfloris\BricklinkApi;

class BricklinkApiResponse
{
    public $code;
    public $hasError;
    public $errorMessage;
    public $results;
    public $rawRequest;
    public $rawResponse;

    public function __construct($response)
    {
        $this->rawResponse = $response->rawResponse;
        $this->rawRequest = $response->rawRequest;
        $responseObject = json_decode($response->rawResponse);
        $this->code = (string)$responseObject->meta->code;

        if ($this->hasError = (substr($this->code, 0, 1) !== '2')) {
            $this->errorMessage = $responseObject->meta->description;
        } else {
            $this->results = $responseObject->data;
        }
    }
}