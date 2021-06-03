<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\ProductIdentityRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ProductIdentityRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class ProductIdentityRequestDTOTest extends DTOTest
{
    /**
     * @var ProductIdentityRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = ProductIdentityRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids' => ['someField' => 'someValue'],
        ];
        $this->dto = new ProductIdentityRequestDTO($data);
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
}
