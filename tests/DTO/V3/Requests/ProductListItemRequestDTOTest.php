<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\ProductListItemRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ProductListItemRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class ProductListItemRequestDTOTest extends DTOTest
{
    /**
     * @var ProductListItemRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = ProductListItemRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'product' => ['someField' => 'someValue'],
            'count'   => 'some_count',
            'price'   => 'some_price',
        ];
        $this->dto = new ProductListItemRequestDTO($data);
    }

    public function testGetProduct()
    {
        $field = $this->dto->getProduct();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\ProductRequestDTO::class, $field);
    }

    public function testSetProduct()
    {
        $this->dto->setProduct(['name' => 'someName']);
        $field = $this->dto->getProduct();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\ProductRequestDTO::class, $field);
        $this->assertSame('someName', $field->getName());
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

    public function testGetPrice()
    {
        $field = $this->dto->getPrice();

        $this->assertSame('some_price', $field);
    }

    public function testSetPrice()
    {
        $this->dto->setPrice('new_price');
        $field = $this->dto->getPrice();

        $this->assertSame('new_price', $field);
    }
}
