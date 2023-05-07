<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Rmfloris\BricklinkApi\BricklinkApi;

final class BricklinkApiTest extends TestCase
{
    public function testHasRightPropertiesOnConstruction(): void
    {
        $bricklinkApi = new BricklinkApi([
            "consumerKey" => "123",
            "consumerSecret" => "456",
            "tokenValue" => "789",
            "tokenSecret" => "1011",
        ]);

        $this->assertObjectHasProperty('consumerKey', $bricklinkApi);
        $this->assertObjectHasProperty('consumerSecret', $bricklinkApi);
        $this->assertObjectHasProperty('tokenValue', $bricklinkApi);
        $this->assertObjectHasProperty('tokenSecret', $bricklinkApi);
    }
}