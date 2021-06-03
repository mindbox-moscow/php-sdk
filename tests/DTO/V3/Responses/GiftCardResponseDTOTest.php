<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\GiftCardResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class GiftCardResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class GiftCardResponseDTOTest extends DTOTest
{
    /**
     * @var GiftCardResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = GiftCardResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'product'          => ['someField' => 'someValue'],
            'amount'           => 'some_amount',
            'status'           => ['someField' => 'someValue'],
            'basePricePerItem' => 'some_basePricePerItem',
        ];
        $this->dto = new GiftCardResponseDTO($data);
    }

    public function testGetProduct()
    {
        $field = $this->dto->getProduct();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\ProductResponseDTO::class, $field);
    }

    public function testGetAmount()
    {
        $field = $this->dto->getAmount();

        $this->assertSame('some_amount', $field);
    }

    public function testGetStatus()
    {
        $field = $this->dto->getStatus();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\GiftCardStatusResponseDTO::class, $field);
    }

    public function testGetBasePricePerItem()
    {
        $field = $this->dto->getBasePricePerItem();

        $this->assertSame('some_basePricePerItem', $field);
    }
}
