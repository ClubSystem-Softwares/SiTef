<?php

namespace CSWeb\SiTef;

use CSWeb\SiTef\Http\Http;

/**
 * SiTef
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package CSWeb\SiTef
 */
class SiTef
{
    protected $env;

    protected $http;

    public function __construct(Environment $env)
    {
        $this->env  = $env;
        $this->http = new Http($env);
    }
}
