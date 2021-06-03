<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\CategoryRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CategoryRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class CategoryRequestDTOTest extends DTOTest
{
    /**
     * @var CategoryRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = CategoryRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids' => ['someField' => 'someValue'],
        ];
        $this->dto = new CategoryRequestDTO($data);
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

        $this->assertSame('some_bitrixId', $field['bitrixId']);
    }
}
