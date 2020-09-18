<?php

namespace Tests;

use CSWeb\SiTef\Environment;
use CSWeb\SiTef\SiTef;
use PHPUnit\Framework\TestCase;

class SiTefTest extends TestCase
{
    public function testInstance()
    {
        $env   = new Environment('abc', 'def');
        $sitef = new SiTef($env);

        $this->assertInstanceOf(SiTef::class, $sitef);
    }

    public function testSitefHasHttpComponent()
    {
        $this->assertClassHasAttribute('http', SiTef::class);
    }
}
