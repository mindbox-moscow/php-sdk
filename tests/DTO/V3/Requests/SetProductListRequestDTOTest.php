<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\SetProductListRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class SetProductListRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class SetProductListRequestDTOTest extends DTOTest
{
    /**
     * @var SetProductListRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = SetProductListRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'products' => [['someField' => 'someValue'], ['someField' => 'someValue']],
        ];
        $this->dto = new SetProductListRequestDTO($data);
    }

    public function testGetProduct()
    {
        $field = $this->dto->getProducts();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\ProductListItemRequestCollection::class, $field);
    }

    public function testSetProduct()
    {
        $this->dto->setProducts([['someField' => 'someValue'], ['someField' => 'someValue']]);
        $field = $this->dto->getProducts();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\ProductListItemRequestCollection::class, $field);
    }
}
