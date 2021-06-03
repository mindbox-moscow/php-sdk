<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\PointOfContactResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PointOfContactResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class PointOfContactResponseDTOTest extends DTOTest
{
    /**
     * @var PointOfContactResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PointOfContactResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids' => ['someField' => 'someValue'],
        ];
        $this->dto = new PointOfContactResponseDTO($data);
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
