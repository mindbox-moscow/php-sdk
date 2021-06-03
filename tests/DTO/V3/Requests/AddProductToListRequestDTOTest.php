<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\AddProductToListRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class AddProductToListRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class AddProductToListRequestDTOTest extends DTOTest
{
    /**
     * @var AddProductToListRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = AddProductToListRequestDTO::class;

    /**
     *
     */
    public function asJsonFieldsProvider()
    {
        return array_merge(parent::asJsonFieldsProvider(), [
            [
                [
                    'product' => [
                        'someField' => 'someName'
                    ],
                ],
                '{"product":{"someField":"someName"}}',
            ],
        ]);
    }

    /**
     *
     */
    public function asXmlFieldsProvider()
    {
        return array_merge(parent::asXmlFieldsProvider(), [
            [
                [
                    'product' => [
                        'someField' => 'someName'
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><product><someField>someName</someField></product></' . $this->getXmlName() . '>
',
            ],
        ]);
    }

    public function setUp(): void
    {
        $data      = [
            'product' => [
                'someField' => 'someValue',
            ],
        ];
        $this->dto = new AddProductToListRequestDTO($data);
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
