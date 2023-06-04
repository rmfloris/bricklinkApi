<?php

namespace Rmfloris\BricklinkApi;

use Rmfloris\BricklinkApi\client\ClientExecutor;
use Rmfloris\BricklinkApi\BricklinkApiResponse;

class BricklinkApi 
{
    private string $endpoint = 'https://api.bricklink.com/api/store/v1';
    private string $path;
    private string $method = "GET";
    /** @var array<mixed> */
    private array $params;

    /**
     * @param array<mixed> $params
     */
    public function __construct($params)
    {
        foreach($params as $key=>$value){
			if(property_exists($this, $key)){
				$this->{$key} = $value;
			}
		}
    }

    public function getOrders(?string $direction = "in", ?string $status = '', ?bool $filed = false): void
    {
        $this->path = "/orders";

        $this->params = [
            "direction" => $direction,
            "status" => $status,
            "filed" => $filed
        ];

        $this->execute();
    }

    

    private function execute(): object
    {
        $clientResponse = ClientExecutor::executeWithAuthorization($this->endpoint, $this->path, $this->method, $this->params, $this->getAuthorizationHeader());
        return new BricklinkApiResponse($clientResponse);
    }
}