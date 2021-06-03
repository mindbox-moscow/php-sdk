<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\BalanceGiftCardResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class BalanceGiftCardResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class BalanceGiftCardResponseDTOTest extends DTOTest
{
    /**
     * @var BalanceGiftCardResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = BalanceGiftCardResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'total'     => 'some_total',
            'available' => 'some_available',
            'used'      => 'some_used',
        ];
        $this->dto = new BalanceGiftCardResponseDTO($data);
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

    public function testGetUsed()
    {
        $field = $this->dto->getUsed();

        $this->assertSame('some_used', $field);
    }
}
