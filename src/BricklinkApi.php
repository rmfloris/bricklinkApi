<?php

namespace Rmfloris\BricklinkApi;

class BricklinkApi 
{
    private string $endpoint = 'https://api.bricklink.com/api/store/v1';
    private string $oauthVersion = '1.0';
    private string $consumerKey;
    private string $consumerSecret;
    private string $tokenValue;
    private string $tokenSecret;

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
    /**
     * @param array<mixed> $params
     */
    public function getItem($params): void 
    {

    }
}