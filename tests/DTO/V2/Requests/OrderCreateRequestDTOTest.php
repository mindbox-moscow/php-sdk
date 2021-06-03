<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\OrderCreateRequestDTO;

/**
 * Class OrderCreateRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class OrderCreateRequestDTOTest extends OrderRequestDTOTest
{
    /**
     * @var OrderCreateRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = OrderCreateRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'                          => ['someField' => 'someValue'],
            'pointOfContact'               => 'some_pointOfContact',
            'area'                         => 'some_area',
            'customer'                     => ['someField' => 'someValue'],
            'discounts'                    => [['someField' => 'someValue']],
            'deliveryCost'                 => 'some_deliveryCost',
            'customFields'                 => ['someField' => 'someValue'],
            'lines'                        => [['someField' => 'someValue']],
            'payments'                     => [['someField' => 'someValue']],
            'createdDateTimeUtc'           => 'some_createdDateTimeUtc',
            'preOrderDiscountedTotalPrice' => 'some_preOrderDiscountedTotalPrice',
        ];
        $this->dto = new OrderCreateRequestDTO($data);
    }

    public function testGetCreatedDateTimeUtc()
    {
        $field = $this->dto->getCreatedDateTimeUtc();

        $this->assertSame('some_createdDateTimeUtc', $field);
    }

    public function testSetCreatedDateTimeUtc()
    {
        $this->dto->setCreatedDateTimeUtc('new_createdDateTimeUtc');
        $field = $this->dto->getCreatedDateTimeUtc();

        $this->assertSame('new_createdDateTimeUtc', $field);
    }

    public function testGetPreOrderDiscountedTotalPrice()
    {
        $field = $this->dto->getPreOrderDiscountedTotalPrice();

        $this->assertSame('some_preOrderDiscountedTotalPrice', $field);
    }

    public function testSetPreOrderDiscountedTotalPrice()
    {
        $this->dto->setPreOrderDiscountedTotalPrice('new_preOrderDiscountedTotalPrice');
        $field = $this->dto->getPreOrderDiscountedTotalPrice();

        $this->assertSame('new_preOrderDiscountedTotalPrice', $field);
    }
}
