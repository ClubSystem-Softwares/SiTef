<?php

namespace CSWeb\SiTef;

/**
 * Environment
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package CSWeb\SiTef
 */
class Environment
{
    public const URL_PRODUCAO = 'https://esitef-ec.softwareexpress.com.br/e-sitef/api';

    public const URL_SANDBOX = 'https://esitef-homologacao.softwareexpress.com.br/e-sitef/api';

    protected $merchantId;

    protected $merchantKey;

    protected $sandbox;

    public function __construct(string $merchantId, string $merchantKey, bool $sandbox = false)
    {
        $this->merchantId  = $merchantId;
        $this->merchantKey = $merchantKey;
        $this->sandbox     = $sandbox;
    }

    public function getMerchantId() : string
    {
        return $this->merchantId;
    }

    public function setMerchandId(string $merchantId) : Environment
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function getMerchantKey() : string
    {
        return $this->merchantKey;
    }

    public function setMerchantKey(string $merchantKey) : Environment
    {
        $this->merchantKey = $merchantKey;

        return $this;
    }

    public function getSandbox() : bool
    {
        return $this->sandbox;
    }

    public function setSandbox(bool $sandbox) : Environment
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    public function apiUrl() : string
    {
        return $this->getSandbox()
            ? self::URL_SANDBOX
            : self::URL_PRODUCAO;
    }
}
