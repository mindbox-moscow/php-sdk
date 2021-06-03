<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\BalanceDiscountResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class BalanceDiscountResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class BalanceDiscountResponseDTOTest extends DTOTest
{
    /**
     * @var BalanceDiscountResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = BalanceDiscountResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'balanceType' => ['name' => 'some_name'],
            'total'       => 'some_total',
            'available'   => 'some_available',
            'blocked'     => 'some_blocked',
        ];
        $this->dto = new BalanceDiscountResponseDTO($data);
    }

    public function testGetBalanceType()
    {
        $field = $this->dto->getBalanceType();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\BalanceTypeResponseDTO::class, $field);
        $this->assertSame('some_name', $field->getName());
    }

    public function testGetTotal()
    {
        $field = $this->dto->getTotal();

        $this->assertSame('some_total', $field);
    }

    public function testGetAvailable()
    {
        $field = $this->dto->getAvailable();

        $this->assertSame('some_available', $field);
    }

    public function testGetBlocked()
    {
        $field = $this->dto->getBlocked();

        $this->assertSame('some_blocked', $field);
    }
}
