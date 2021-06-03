<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\SetProductCountInListRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class SetProductCountInListRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class SetProductCountInListRequestDTOTest extends DTOTest
{
    /**
     * @var SetProductCountInListRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = SetProductCountInListRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'product' => ['someField' => 'someValue'],
            'count'   => 'some_count',
        ];
        $this->dto = new SetProductCountInListRequestDTO($data);
    }

    public function testGetProduct()
    {
        $field = $this->dto->getProduct();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\ProductRequestDTO::class, $field);
    }

    public function testSetProduct()
    {
        $this->dto->setProduct(['price' => 'value']);
        $field = $this->dto->getProduct();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\ProductRequestDTO::class, $field);
        $this->assertSame('value', $field->getPrice());
    }

    public function testGetCount()
    {
        $field = $this->dto->getCount();

        $this->assertSame('some_count', $field);
    }

    public function testSetCount()
    {
        $this->dto->setCount('new_count');
        $field = $this->dto->getCount();

        $this->assertSame('new_count', $field);
    }
}
