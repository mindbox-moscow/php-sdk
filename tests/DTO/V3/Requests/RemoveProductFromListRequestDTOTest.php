<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\RemoveProductFromListRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class RemoveProductFromListRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class RemoveProductFromListRequestDTOTest extends DTOTest
{
    /**
     * @var RemoveProductFromListRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = RemoveProductFromListRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'product' => [
                'someField' => 'someValue',
            ],
        ];
        $this->dto = new RemoveProductFromListRequestDTO($data);
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
}
