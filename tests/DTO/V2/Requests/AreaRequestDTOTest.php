<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\AreaRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class AreaRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class AreaRequestDTOTest extends DTOTest
{
    /**
     * @var \Mindbox\DTO\V2\Requests\AreaRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = AreaRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'  => ['someField' => 'someValue'],
            'name' => 'some_name',
        ];
        $this->dto = new AreaRequestDTO($data);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testSetIds()
    {
        $this->dto->setIds(['bitrixId' => 'some_bitrixId']);
        $field = $this->dto->getIds();

        $this->assertSame(['bitrixId' => 'some_bitrixId'], $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }

    public function testSetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);

        $this->dto->setId('new_bitrixId', 'new_bitrixId_val');
        $field = $this->dto->getId('new_bitrixId');

        $this->assertSame('new_bitrixId_val', $field);
    }

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }

    public function testSetName()
    {
        $this->dto->setName('otherName');
        $field = $this->dto->getName();

        $this->assertSame('otherName', $field);
    }
}
