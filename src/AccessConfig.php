<?php

namespace CSWeb\SiTef;

/**
 * AccessConfig
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package CSWeb\SiTef
 */
class AccessConfig
{
    protected $merchantId;

    protected $merchantKey;

    public function __construct(string $merchantId, string $merchantKey)
    {
        $this->merchantId  = $merchantId;
        $this->merchantKey = $merchantKey;
    }

    public function merchantId() : string
    {
        return $this->merchantId;
    }

    public function setMerchandId(string $merchantId) : AccessConfig
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function merchantKey() : string
    {
        return $this->merchantKey;
    }

    public function setMerchantKey(string $merchantKey) : AccessConfig
    {
        $this->merchantKey = $merchantKey;

        return $this;
    }
}
