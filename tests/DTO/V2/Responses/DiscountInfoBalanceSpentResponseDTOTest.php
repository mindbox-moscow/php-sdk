<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\DiscountInfoBalanceSpentResponseDTO;

/**
 * Class DiscountInfoBalanceSpentResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class DiscountInfoBalanceSpentResponseDTOTest extends DiscountInfoBalanceResponseDTOTest
{
    /**
     * @var DiscountInfoBalanceSpentResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = DiscountInfoBalanceSpentResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'type'                           => 'some_type',
            'availableAmountForCurrentOrder' => 'some_availableAmountForCurrentOrder',
            'balance'                        => ['blocked' => 'some_blocked'],
            'spentAmountForCurrentOrder'     => 'some_spentAmountForCurrentOrder',
        ];
        $this->dto = new DiscountInfoBalanceSpentResponseDTO($data);
    }

    public function testGetSpentAmountForCurrentOrder()
    {
        $field = $this->dto->getSpentAmountForCurrentOrder();

        $this->assertSame('some_spentAmountForCurrentOrder', $field);
    }
}
