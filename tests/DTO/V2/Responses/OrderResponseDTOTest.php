<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\OrderResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class OrderResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class OrderResponseDTOTest extends DTOTest
{
    /**
     * @var OrderResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = OrderResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'                        => ['someField' => 'someValue'],
            'pointOfContact'             => 'some_pointOfContact',
            'area'                       => 'some_area',
            'discountedTotalPrice'       => 'some_discountedTotalPrice',
            'appliedDiscounts'           => [['someField' => 'someValue']],
            'totalAcquiredBalanceChange' => 'some_totalAcquiredBalanceChange',
            'createdPointOfContact'      => 'some_createdPointOfContact',
            'placeHolders'               => [['someField' => 'someValue']],
            'discountsInfo'              => [['someField' => 'someValue']],
            'paymentsInfo'               => [['someField' => 'someValue']],
            'createdDateTimeUtc'         => 'some_createdDateTimeUtc',
            'customer'                   => ['someField' => 'someValue'],
            'lines'                      => [['someField' => 'someValue']],
            'payments'                   => [['someField' => 'someValue']],
        ];
        $this->dto = new OrderResponseDTO($data);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }

    public function testGetPointOfContact()
    {
        $field = $this->dto->getPointOfContact();

        $this->assertSame('some_pointOfContact', $field);
    }

    public function testGetArea()
    {
        $field = $this->dto->getArea();

        $this->assertSame('some_area', $field);
    }

    public function testGetDiscountedTotalPrice()
    {
        $field = $this->dto->getDiscountedTotalPrice();

        $this->assertSame('some_discountedTotalPrice', $field);
    }

    public function testGetAppliedDiscounts()
    {
        $field = $this->dto->getAppliedDiscounts();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\AppliedDiscountResponseCollection::class, $field);
    }

    public function testGetTotalAcquiredBalanceChange()
    {
        $field = $this->dto->getTotalAcquiredBalanceChange();

        $this->assertSame('some_totalAcquiredBalanceChange', $field);
    }

    public function testGetCreatedPointOfContact()
    {
        $field = $this->dto->getCreatedPointOfContact();

        $this->assertSame('some_createdPointOfContact', $field);
    }

    public function testGetPlaceholders()
    {
        $field = $this->dto->getPlaceholders();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PlaceholderResponseCollection::class, $field);
    }

    public function testGetDiscountsInfo()
    {
        $field = $this->dto->getDiscountsInfo();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\DiscountInfoResponseCollection::class, $field);
    }

    public function testGetPaymentsInfo()
    {
        $field = $this->dto->getPaymentsInfo();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PaymentInfoResponseCollection::class, $field);
    }

    public function testGetCreatedDateTimeUtc()
    {
        $field = $this->dto->getCreatedDateTimeUtc();

        $this->assertSame('some_createdDateTimeUtc', $field);
    }

    public function testGetCustomer()
    {
        $field = $this->dto->getCustomer();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\CustomerResponseDTO::class, $field);
    }

    public function testGetLines()
    {
        $field = $this->dto->getLines();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\LineResponseCollection::class, $field);
    }

    public function testGetPayments()
    {
        $field = $this->dto->getPayments();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PaymentResponseCollection::class, $field);
    }
}
