<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\AppliedDiscountResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class AppliedDiscountResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class AppliedDiscountResponseDTOTest extends DTOTest
{
    /**
     * @var AppliedDiscountResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = AppliedDiscountResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'        => 'some_type',
            'id'          => 'some_id',
            'amount'      => 'some_amount',
            'promoAction' => ['name' => 'some_name'],
            'balanceType' => ['name' => 'some_balanceTypeName'],
        ];
        $this->dto = new AppliedDiscountResponseDTO($data);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId();

        $this->assertSame('some_id', $field);
    }

    public function testGetAmount()
    {
        $field = $this->dto->getAmount();

        $this->assertSame('some_amount', $field);
    }

    public function testGetPromoAction()
    {
        $field = $this->dto->getPromoAction();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PromoActionResponseDTO::class, $field);
        $this->assertSame('some_name', $field->getName());
    }

    public function testGetBalanceType()
    {
        $field = $this->dto->getBalanceType();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\BalanceTypeResponseDTO::class, $field);
        $this->assertSame('some_balanceTypeName', $field->getName());
    }
}
