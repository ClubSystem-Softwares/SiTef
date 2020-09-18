<?php

namespace Tests;

use CSWeb\SiTef\AccessConfig;
use PHPUnit\Framework\TestCase;

class AccessConfigTest extends TestCase
{
    public function testAccessConfigInstance()
    {
        $config = new AccessConfig(
            bin2hex(random_bytes(16)),
            bin2hex(random_bytes(16))
        );

        $this->assertInstanceOf(AccessConfig::class, $config);
    }

    public function testGetters()
    {
        $id  = bin2hex(random_bytes(16));
        $key = bin2hex(random_bytes(16));

        $config = new AccessConfig($id, $key);

        $this->assertEquals($id, $config->merchantId());
        $this->assertEquals($key, $config->merchantKey());
    }

    public function testSetters()
    {
        $id  = bin2hex(random_bytes(16));
        $key = bin2hex(random_bytes(16));

        $config = new AccessConfig($id, $key);

        $newId  = bin2hex(random_bytes(16));
        $newKey = bin2hex(random_bytes(16));

        $config->setMerchandId($newId)
               ->setMerchantKey($newKey);

        $this->assertEquals($newId, $config->merchantId());
        $this->assertEquals($newKey, $config->merchantKey());
    }
}
