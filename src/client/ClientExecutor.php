<?php
namespace Rmfloris\BricklinkApi\client;

use Rmfloris\BricklinkApi\client\ClientResponse;

class ClientExecutor
{
    public static function executeWithAuthorization(string $endpoint, string $path, string $method, array $params, string $authorizationHeader): object
    {
        $ch = curl_init();
        
        $curlUrl = $path."?Authorization=". $authorizationHeader;

        if(count($params) && $method == "GET") {
            $curlUrl = $path . "?" . http_build_query($params) . "&Authorization=" . $authorizationHeader;
        }

        curl_setopt($ch, CURLOPT_URL, $endpoint . $curlUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        return new ClientResponse($ch, curl_exec($ch));
    }
    
} 