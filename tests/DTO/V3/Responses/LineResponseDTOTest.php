<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\LineResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class LineResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class LineResponseDTOTest extends DTOTest
{
    /**
     * @var LineResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = LineResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'product'           => ['someField' => 'someValue'],
            'basePricePerItem'  => 'some_basePricePerItem',
            'priceOfLine'       => 'some_priceOfLine',
            'status'            => ['someField' => 'someValue'],
            'appliedPromotions' => [['someField' => 'someValue'],],
            'giftCard'          => ['someField' => 'someValue'],
            'lineId'            => 'some_lineId',
            'quantity'          => 'some_quantity',
        ];
        $this->dto = new LineResponseDTO($data);
    }

    public function testGetProduct()
    {
        $field = $this->dto->getProduct();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\ProductIdentityResponseDTO::class, $field);
    }


    public function testGetBasePricePerItem()
    {
        $field = $this->dto->getBasePricePerItem();

        $this->assertSame('some_basePricePerItem', $field);
    }

    public function testGetPriceOfLine()
    {
        $field = $this->dto->getPriceOfLine();

        $this->assertSame('some_priceOfLine', $field);
    }

    public function testGetStatus()
    {
        $field = $this->dto->getStatus();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\LineStatusResponseDTO::class, $field);
    }

    public function testGetAppliedPromotions()
    {
        $field = $this->dto->getAppliedPromotions();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\AppliedPromotionResponseCollection::class, $field);
    }

    public function testGetGiftCard()
    {
        $field = $this->dto->getGiftCard();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\GiftCardResponseDTO::class, $field);
    }

    public function testGetLineId()
    {
        $field = $this->dto->getLineId();

        $this->assertSame('some_lineId', $field);
    }

    public function testGetQuantity()
    {
        $field = $this->dto->getQuantity();

        $this->assertSame('some_quantity', $field);
    }
}
