<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\LineResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class LineResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
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
            'quantity'         => 'some_quantity',
            'customFields'     => ['someField' => 'someValue'],
            'basePricePerItem' => 'some_basePricePerItem',
            'status'           => 'some_status',
            'appliedDiscounts' => [['someField' => 'someValue']],
            'placeHolders'     => [['someField' => 'someValue']],
            'giftCard'         => ['someField' => 'someValue'],
            'discountedPrice'  => 'some_discountedPrice',
        ];
        $this->dto = new LineResponseDTO($data);
    }

    public function testGetQuantity()
    {
        $field = $this->dto->getQuantity();

        $this->assertSame('some_quantity', $field);
    }

    public function testGetCustomFields()
    {
        $field = $this->dto->getCustomFields();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testGetCustomField()
    {
        $field = $this->dto->getCustomField('someField');

        $this->assertSame('someValue', $field);
    }

    public function testGetBasePricePerItem()
    {
        $field = $this->dto->getBasePricePerItem();

        $this->assertSame('some_basePricePerItem', $field);
    }

    public function testGetStatus()
    {
        $field = $this->dto->getStatus();

        $this->assertSame('some_status', $field);
    }

    public function testGetAppliedDiscounts()
    {
        $field = $this->dto->getAppliedDiscounts();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\AppliedDiscountResponseCollection::class, $field);
    }

    public function testGetPlaceholders()
    {
        $field = $this->dto->getPlaceholders();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PlaceholderResponseCollection::class, $field);
    }

    public function testGetGiftCard()
    {
        $field = $this->dto->getGiftCard();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\GiftCardResponseDTO::class, $field);
    }
}
