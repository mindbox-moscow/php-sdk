<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\PaymentResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PaymentResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class PaymentResponseDTOTest extends DTOTest
{
    /**
     * @var PaymentResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = PaymentResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'id'            => 'some_id',
            'promoActionId' => 'some_promoActionId',
            'creditCard'    => ['someField' => 'someValue'],
            'balanceType'   => ['someField' => 'someValue'],
            'type'          => 'some_type',
            'amount'        => 'some_amount',
        ];
        $this->dto = new PaymentResponseDTO($data);
    }

    public function testGetAmount()
    {
        $field = $this->dto->getAmount();

        $this->assertSame('some_amount', $field);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId();

        $this->assertSame('some_id', $field);
    }

    public function testGetPromoActionId()
    {
        $field = $this->dto->getPromoActionId();

        $this->assertSame('some_promoActionId', $field);
    }

    public function testGetCreditCard()
    {
        $field = $this->dto->getCreditCard();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\CreditCardResponseDTO::class, $field);
    }

    public function testGetBalanceType()
    {
        $field = $this->dto->getBalanceType();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\BalanceTypeResponseDTO::class, $field);
    }
}
