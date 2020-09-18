<?php

namespace CSWeb\SiTef\Operations;

/**
 * Transaction
 *
 * @author Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @package CSWeb\SiTef\Operations
 */
class Transaction
{
    protected $amount;

    protected $merchantUsn;

    protected $orderId;

    protected $installments;

    protected $installmentType;

    protected $authorizerId;

    public function __construct(
        float $amount,
        string $merchantUsn,
        string $orderId,
        int $installments = 1,
        int $installmentType = 4,
        int $authorizerId = 2
    ) {
        $this->setAmount($amount)
             ->setMerchantUsn($merchantUsn)
             ->setOrderId($orderId)
             ->setInstallments($installments)
             ->setInstallmentType($installmentType)
             ->setAuthorizerId($authorizerId);
    }

    public function getAmount() : int
    {
        return $this->amount;
    }

    public function setAmount(float $amount) : Transaction
    {
        $this->amount = $amount * 100;

        return $this;
    }

    public function getMerchantUsn() : string
    {
        return $this->merchantUsn;
    }

    public function setMerchantUsn(string $merchantUsn) : Transaction
    {
        $this->merchantUsn = $merchantUsn;

        return $this;
    }

    public function getOrderId() : string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId) : Transaction
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getInstallments() : int
    {
        return $this->installments;
    }

    public function setInstallments(int $installments) : Transaction
    {
        $this->installments = $installments;

        return $this;
    }

    public function getInstallmentType() : int
    {
        return $this->installmentType;
    }

    public function setInstallmentType(int $installmentType) : Transaction
    {
        $this->installmentType = $installmentType;

        return $this;
    }

    public function getAuthorizerId() : int
    {
        return $this->authorizerId;
    }

    public function setAuthorizerId(int $authorizerId) : Transaction
    {
        $this->authorizerId = $authorizerId;
        return $this;
    }

    public function toArray() : array
    {
        return get_object_vars($this);
    }
}
