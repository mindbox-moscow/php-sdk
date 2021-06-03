<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PossibleDiscountsValueDiscountResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PossibleDiscountsValueDiscountResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PossibleDiscountsValueDiscountResponseDTOTest extends DTOTest
{
    /**
     * @var PossibleDiscountsValueDiscountResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PossibleDiscountsValueDiscountResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'amount'     => 'some_amount',
            'amountType' => 'some_amountType',
        ];
        $this->dto = new PossibleDiscountsValueDiscountResponseDTO($data);
    }

    public function testGetAmount()
    {
        $field = $this->dto->getAmount();

        $this->assertSame('some_amount', $field);
    }

    public function testGetAmountType()
    {
        $field = $this->dto->getAmountType();

        $this->assertSame('some_amountType', $field);
    }
}
