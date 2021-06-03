<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PossibleDiscountsValueResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PossibleDiscountsValueResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PossibleDiscountsValueResponseDTOTest extends DTOTest
{
    /**
     * @var PossibleDiscountsValueResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PossibleDiscountsValueResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'discount'   => ['amount' => 'some_amount'],
            'itemsCount' => 'some_itemsCount',
            'items'      => ['someField' => 'someValue'],
        ];
        $this->dto = new PossibleDiscountsValueResponseDTO($data);
    }

    public function testGetDiscount()
    {
        $field = $this->dto->getDiscount();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PossibleDiscountsValueDiscountResponseDTO::class, $field);
        $this->assertSame('some_amount', $field->getAmount());
    }

    public function testGetItemsCount()
    {
        $field = $this->dto->getItemsCount();

        $this->assertSame('some_itemsCount', $field);
    }

    public function testGetItems()
    {
        $field = $this->dto->getItems();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PossibleDiscountsValueItemResponseCollection::class, $field);
    }
}
