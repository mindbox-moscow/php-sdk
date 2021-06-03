<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\OrderUpdateRequestDTO;

/**
 * Class OrderUpdateRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class OrderUpdateRequestDTOTest extends OrderRequestDTOTest
{
    /**
     * @var OrderUpdateRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = OrderUpdateRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'                => ['someField' => 'someValue'],
            'pointOfContact'     => 'some_pointOfContact',
            'area'               => 'some_area',
            'customer'           => ['someField' => 'someValue'],
            'discounts'          => [['someField' => 'someValue']],
            'deliveryCost'       => 'some_deliveryCost',
            'customFields'       => ['someField' => 'someValue'],
            'lines'              => [['someField' => 'someValue']],
            'payments'           => [['someField' => 'someValue']],
            'updatedDateTimeUtc' => 'some_updatedDateTimeUtc',
            'totalPrice'         => 'some_totalPrice',
        ];
        $this->dto = new OrderUpdateRequestDTO($data);
    }

    public function testGetUpdatedDateTimeUtc()
    {
        $field = $this->dto->getUpdatedDateTimeUtc();

        $this->assertSame('some_updatedDateTimeUtc', $field);
    }

    public function testSetUpdatedDateTimeUtc()
    {
        $this->dto->setUpdatedDateTimeUtc('new_updatedDateTimeUtc');
        $field = $this->dto->getUpdatedDateTimeUtc();

        $this->assertSame('new_updatedDateTimeUtc', $field);
    }

    public function testGetTotalPrice()
    {
        $field = $this->dto->getTotalPrice();

        $this->assertSame('some_totalPrice', $field);
    }

    public function testSetTotalPrice()
    {
        $this->dto->setTotalPrice('new_totalPrice');
        $field = $this->dto->getTotalPrice();

        $this->assertSame('new_totalPrice', $field);
    }
}
