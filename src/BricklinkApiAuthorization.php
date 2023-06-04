<?php

namespace Rmfloris\BricklinkApi;

class BricklinkApiAuthorization 
{
    private string $oauthVersion = '1.0';
    private string $consumerKey;
    private string $consumerSecret;
    private string $tokenValue;
    private string $tokenSecret;
    
    private function __construct(string $consumerKey, string $tokenValue)
    {
        $this->consumerKey = $consumerKey;
        $this->tokenValue = $tokenValue;

        $this->getAuthorizationHeader();        
    }

    private function getAuthorizationHeader(): string
    {
        $authorization = [
            'oauth_consumer_key' => $this->consumerKey,
            'oauth_nonce' => substr(md5(rand()), 0, 7),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_signature' => null,
            'oauth_timestamp' => (string)time(),
            'oauth_token' => $this->tokenValue,
            'oauth_version' => $this->oauthVersion
        ];

        $authorization['oauth_signature'] = $this->generateSignature($authorization);
        $jsonAuthorization = json_encode($authorization);

        return rawurlencode($jsonAuthorization);
    }


    private function generateSignature(array $authorization): string 
    {
        $parameters = array_merge($authorization, $this->params);
        ksort($parameters);
        $parameterString = http_build_query($parameters);
    
        $key = BRICKLINK_CONSUMER_SECRET."&".BRICKLINK_TOKEN_SECRET;
    
        return base64_encode(hash_hmac('sha1', 'GET&' . rawurlencode($this->endpoint . $this->path) . '&' . rawurlencode($parameterString), $key, true));
    }
}

