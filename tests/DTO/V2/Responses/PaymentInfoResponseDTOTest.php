<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PaymentInfoResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PaymentInfoResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PaymentInfoResponseDTOTest extends DTOTest
{
    /**
     * @var PaymentInfoResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PaymentInfoResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'                           => 'some_type',
            'availableAmountForCurrentOrder' => 'some_availableAmountForCurrentOrder',
            'giftCard'                       => ['status' => 'some_status'],
        ];
        $this->dto = new PaymentInfoResponseDTO($data);
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

    public function testGetGiftCard()
    {
        $field = $this->dto->getGiftCard();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\GiftCardResponseDTO::class, $field);
        $this->assertSame('some_status', $field->getStatus());
    }
}
