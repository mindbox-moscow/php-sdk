<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\ContentItemTextResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ContentItemTextResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class ContentItemTextResponseDTOTest extends DTOTest
{
    /**
     * @var ContentItemTextResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = ContentItemTextResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'          => 'some_type',
            'promoActionId' => 'some_promoActionId',
            'value'         => 'some_value',
        ];
        $this->dto = new ContentItemTextResponseDTO($data);
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

        $this->assertSame('some_value', $field);
    }
}
