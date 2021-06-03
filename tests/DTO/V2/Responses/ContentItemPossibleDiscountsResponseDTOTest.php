<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\ContentItemPossibleDiscountsResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ContentItemPossibleDiscountsResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class ContentItemPossibleDiscountsResponseDTOTest extends DTOTest
{
    /**
     * @var ContentItemPossibleDiscountsResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = ContentItemPossibleDiscountsResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'          => 'some_type',
            'promoActionId' => 'some_promoActionId',
            'value'         => ['itemsCount' => 'some_itemsCount'],
        ];
        $this->dto = new ContentItemPossibleDiscountsResponseDTO($data);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testGetPromoActionId()
    {
        $field = $this->dto->getPromoActionId();

        $this->assertSame('some_promoActionId', $field);
    }

    public function testGetValue()
    {
        $field = $this->dto->getValue();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PossibleDiscountsValueResponseDTO::class, $field);
        $this->assertSame('some_itemsCount', $field->getItemsCount());
    }
}
