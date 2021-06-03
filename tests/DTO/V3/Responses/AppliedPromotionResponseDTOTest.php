<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\AppliedPromotionResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class AppliedPromotionResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class AppliedPromotionResponseDTOTest extends DTOTest
{
    /**
     * @var AppliedPromotionResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = AppliedPromotionResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'                  => 'some_type',
            'coupon'                => ['someField' => 'someValue'],
            'promotion'             => ['someField' => 'someValue'],
            'balanceType'           => ['someField' => 'someValue'],
            'amount'                => 'some_amount',
            'expirationDateTimeUtc' => 'some_expirationDateTimeUtc',
            'issuedCoupon'          => ['someField' => 'someValue'],
        ];
        $this->dto = new AppliedPromotionResponseDTO($data);
    }

    public function testGetPromotion()
    {
        $field = $this->dto->getPromotion();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\PromotionResponseDTO::class, $field);
    }

    public function testGetBalanceType()
    {
        $field = $this->dto->getBalanceType();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\BalanceTypeResponseDTO::class, $field);
    }

    public function testGetIssuedCoupon()
    {
        $field = $this->dto->getIssuedCoupon();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\IssuedCouponResponseDTO::class, $field);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testGetCoupon()
    {
        $field = $this->dto->getCoupon();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\CouponResponseDTO::class, $field);
    }

    public function testGetExpirationDateTimeUtc()
    {
        $field = $this->dto->getExpirationDateTimeUtc();

        $this->assertSame('some_expirationDateTimeUtc', $field);
    }

    public function testGetAmount()
    {
        $field = $this->dto->getAmount();

        $this->assertSame('some_amount', $field);
    }
}
