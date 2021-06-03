<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\DiscountCardResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class DiscountCardResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class DiscountCardResponseDTOTest extends DTOTest
{
    /**
     * @var DiscountCardResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = DiscountCardResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'   => ['id' => 'some_id'],
            'ids'    => ['someField' => 'someValue'],
            'status' => 'some_status',
        ];
        $this->dto = new DiscountCardResponseDTO($data);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\DiscountCardTypeResponseDTO::class, $field);
        $this->assertSame('some_id', $field->getId());
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

    public function testGetStatus()
    {
        $field = $this->dto->getStatus();

        $this->assertSame('some_status', $field);
    }
}
