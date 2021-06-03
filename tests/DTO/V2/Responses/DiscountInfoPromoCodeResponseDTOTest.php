<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\DiscountInfoPromoCodeResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class DiscountInfoPromoCodeResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class DiscountInfoPromoCodeResponseDTOTest extends DTOTest
{
    /**
     * @var DiscountInfoPromoCodeResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = DiscountInfoPromoCodeResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'                           => 'some_type',
            'availableAmountForCurrentOrder' => 'some_availableAmountForCurrentOrder',
            'promoCode'                      => ['status' => 'some_status'],
        ];
        $this->dto = new DiscountInfoPromoCodeResponseDTO($data);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testGetAvailableAmountForCurrentOrder()
    {
        $field = $this->dto->getAvailableAmountForCurrentOrder();

        $this->assertSame('some_availableAmountForCurrentOrder', $field);
    }

    public function testGetPromoCode()
    {
        $field = $this->dto->getPromoCode();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PromoCodeResponseDTO::class, $field);
        $this->assertSame('some_status', $field->getStatus());
    }
}
