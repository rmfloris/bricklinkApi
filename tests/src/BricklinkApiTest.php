<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Rmfloris\BricklinkApi\BricklinkApi;

final class BricklinkApiTest extends TestCase
{
    private object $bricklinkApi;

    protected function setUp(): void
    {
        $this->bricklinkApi = new BricklinkApi([
            "consumerKey" => "123",
            "consumerSecret" => "456",
            "tokenValue" => "789",
            "tokenSecret" => "1011",
        ]);
    }
    public function testHasRightPropertiesOnConstruction(): void
    {
        $this->assertObjectHasProperty('consumerKey', $this->bricklinkApi);
        $this->assertObjectHasProperty('consumerSecret', $this->bricklinkApi);
        $this->assertObjectHasProperty('tokenValue', $this->bricklinkApi);
        $this->assertObjectHasProperty('tokenSecret', $this->bricklinkApi);
    }

    public function testInitializeGetOrders(): void
    {
        $this->bricklinkApi->getOrders();
        $this->assertObjectHasProperty('params', $this->bricklinkApi);

    }
}