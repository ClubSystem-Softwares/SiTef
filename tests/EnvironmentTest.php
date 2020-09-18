<?php

namespace Tests;

use CSWeb\SiTef\Environment;
use PHPUnit\Framework\TestCase;

class EnvironmentTest extends TestCase
{
    public function testAccessConfigInstance()
    {
        $config = new Environment(
            bin2hex(random_bytes(16)),
            bin2hex(random_bytes(16))
        );

        $this->assertInstanceOf(Environment::class, $config);
    }

    public function testGetters()
    {
        $id  = bin2hex(random_bytes(16));
        $key = bin2hex(random_bytes(16));

        $config = new Environment($id, $key);

        $this->assertEquals($id, $config->getMerchantId());
        $this->assertEquals($key, $config->getMerchantKey());
    }

    public function testSetters()
    {
        $id  = bin2hex(random_bytes(16));
        $key = bin2hex(random_bytes(16));

        $config = new Environment($id, $key);

        $newId  = bin2hex(random_bytes(16));
        $newKey = bin2hex(random_bytes(16));

        $config->setMerchandId($newId)
               ->setMerchantKey($newKey);

        $this->assertEquals($newId, $config->getMerchantId());
        $this->assertEquals($newKey, $config->getMerchantKey());
    }

    public function testUrlSandBox()
    {
        $id  = bin2hex(random_bytes(16));
        $key = bin2hex(random_bytes(16));

        $config = new Environment($id, $key, true);

        $this->assertEquals(Environment::URL_SANDBOX, $config->apiUrl());
    }

    public function testUrlProducao()
    {
        $id  = bin2hex(random_bytes(16));
        $key = bin2hex(random_bytes(16));

        $config = new Environment($id, $key);

        $this->assertEquals(Environment::URL_PRODUCAO, $config->apiUrl());
    }
}
