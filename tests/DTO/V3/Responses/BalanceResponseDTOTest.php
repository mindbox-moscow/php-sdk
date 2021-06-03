<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\BalanceResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class BalanceResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class BalanceResponseDTOTest extends DTOTest
{
    /**
     * @var BalanceResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = BalanceResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'totalValue'     => 'some_totalValue',
            'availableValue' => 'some_availableValue',
            'blockedValue'   => 'some_blockedValue',
        ];
        $this->dto = new BalanceResponseDTO($data);
    }

    public function testGetTotalValue()
    {
        $field = $this->dto->getTotalValue();

        $this->assertSame('some_totalValue', $field);
    }

    public function testGetAvailableValue()
    {
        $field = $this->dto->getAvailableValue();

        $this->assertSame('some_availableValue', $field);
    }

    public function testGetBlockedValue()
    {
        $field = $this->dto->getBlockedValue();

        $this->assertSame('some_blockedValue', $field);
    }
}
