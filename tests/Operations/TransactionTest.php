<?php

namespace Tests\Operations;

use CSWeb\SiTef\Operations\Transaction;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testInstance()
    {
        $newTransaction = new Transaction(
            10.00,
            'abcd123',
            'abc123'
        );

        $this->assertInstanceOf(Transaction::class, $newTransaction);
    }

    public function testGettersAndSetters()
    {
        $amount          = 10.00;
        $merchantUsn     = 'abcd1234';
        $orderId         = $merchantUsn;
        $installments    = 3;
        $installmentType = 4;
        $authorizerId    = 1;

        $transaction = new Transaction(
            $amount,
            $merchantUsn,
            $orderId,
            $installments,
            $installmentType,
            $authorizerId
        );

        $this->assertEquals($amount * 100, $transaction->getAmount());
        $this->assertEquals($merchantUsn, $transaction->getMerchantUsn());
        $this->assertEquals($orderId, $transaction->getOrderId());
        $this->assertEquals($installments, $transaction->getInstallments());
        $this->assertEquals($installmentType, $transaction->getInstallmentType());
        $this->assertEquals($authorizerId, $transaction->getAuthorizerId());
    }

    public function testCompiledData()
    {
        $amount      = 10.00;
        $merchantUsn = 'abcd1234';
        $orderId     = $merchantUsn;

        $transaction = new Transaction($amount, $merchantUsn, $orderId);
        $compiled    = $transaction->toArray();

        $this->assertIsArray($compiled);
        $this->assertArrayHasKey('amount', $compiled);
        $this->assertEquals($amount * 100, $compiled['amount']);
        $this->assertArrayHasKey('merchantUsn', $compiled);
        $this->assertEquals($merchantUsn, $compiled['merchantUsn']);
        $this->assertArrayHasKey('orderId', $compiled);
        $this->assertEquals($orderId, $compiled['orderId']);
    }
}
