<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\OrderResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class OrderResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class OrderResponseDTOTest extends DTOTest
{
    /**
     * @var OrderResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = OrderResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'               => ['someField' => 'someValue'],
            'isCurrentState'    => 'some_isCurrentState',
            'lines'             => [['someField' => 'someValue']],
            'appliedPromotions' => [['someField' => 'someValue']],
            'payments'          => [['someField' => 'someValue']],
            'totalPrice'        => 'some_totalPrice',
        ];
        $this->dto = new OrderResponseDTO($data);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }

    public function testGetIsCurrentState()
    {
        $field = $this->dto->getIsCurrentState();

        $this->assertSame('some_isCurrentState', $field);
    }

    public function testGetLines()
    {
        $field = $this->dto->getLines();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\LineResponseCollection::class, $field);
    }

    public function testGetAppliedPromotions()
    {
        $field = $this->dto->getAppliedPromotions();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\AppliedPromotionResponseCollection::class, $field);
    }

    public function testGetPayments()
    {
        $field = $this->dto->getPayments();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\PaymentResponseCollection::class, $field);
    }

    public function testGetTotalPrice()
    {
        $field = $this->dto->getTotalPrice();

        $this->assertSame('some_totalPrice', $field);
    }
}
