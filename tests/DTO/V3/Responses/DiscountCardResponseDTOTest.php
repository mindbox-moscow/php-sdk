<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\DiscountCardResponseDTO;
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
            'status' => ['someField' => 'someValue'],
        ];
        $this->dto = new DiscountCardResponseDTO($data);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\DiscountCardTypeResponseDTO::class, $field);
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

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\DiscountCardStatusResponseDTO::class, $field);
    }
}
