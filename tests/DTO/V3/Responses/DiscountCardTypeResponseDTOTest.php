<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\DiscountCardTypeResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class DiscountCardTypeResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class DiscountCardTypeResponseDTOTest extends DTOTest
{
    /**
     * @var DiscountCardTypeResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = DiscountCardTypeResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'  => ['someField' => 'someValue'],
            'name' => 'some_name',
        ];
        $this->dto = new DiscountCardTypeResponseDTO($data);
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

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }
}
