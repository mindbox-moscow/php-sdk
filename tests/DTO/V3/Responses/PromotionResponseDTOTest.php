<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\PromotionResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PromotionResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class PromotionResponseDTOTest extends DTOTest
{
    /**
     * @var PromotionResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = PromotionResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'  => ['someField' => 'someValue'],
            'name' => 'some_name',
            'type' => 'some_type',
        ];
        $this->dto = new PromotionResponseDTO($data);
    }

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }
}
