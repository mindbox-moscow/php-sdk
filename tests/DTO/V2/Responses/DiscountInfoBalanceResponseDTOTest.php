<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\DiscountInfoBalanceResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class DiscountInfoBalanceResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class DiscountInfoBalanceResponseDTOTest extends DTOTest
{
    /**
     * @var DiscountInfoBalanceResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = DiscountInfoBalanceResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'                           => 'some_type',
            'availableAmountForCurrentOrder' => 'some_availableAmountForCurrentOrder',
            'balance'                        => ['blocked' => 'some_blocked'],
        ];
        $this->dto = new DiscountInfoBalanceResponseDTO($data);
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

    public function testGetBalance()
    {
        $field = $this->dto->getBalance();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\BalanceDiscountResponseDTO::class, $field);
        $this->assertSame('some_blocked', $field->getBlocked());
    }
}
