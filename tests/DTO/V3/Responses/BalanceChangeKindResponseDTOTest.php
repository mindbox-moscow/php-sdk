<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\BalanceChangeKindResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class BalanceChangeKindResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class BalanceChangeKindResponseDTOTest extends DTOTest
{
    /**
     * @var BalanceChangeKindResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = BalanceChangeKindResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'systemName' => 'some_systemName',
        ];
        $this->dto = new BalanceChangeKindResponseDTO($data);
    }

    public function testGetSystemName()
    {
        $field = $this->dto->getSystemName();

        $this->assertSame('some_systemName', $field);
    }
}
