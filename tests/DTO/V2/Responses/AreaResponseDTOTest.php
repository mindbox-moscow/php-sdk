<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\AreaResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class AreaResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class AreaResponseDTOTest extends DTOTest
{
    /**
     * @var \Mindbox\DTO\V2\Responses\AreaResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = AreaResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'  => ['someField' => 'someValue'],
            'name' => 'some_name',
        ];
        $this->dto = new AreaResponseDTO($data);
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

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }
}
