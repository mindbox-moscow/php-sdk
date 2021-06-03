<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\BalanceTypeResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class BalanceTypeResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class BalanceTypeResponseDTOTest extends DTOTest
{
    /**
     * @var BalanceTypeResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = BalanceTypeResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'  => ['someField' => 'someValue'],
            'name' => 'some_name',
        ];
        $this->dto = new BalanceTypeResponseDTO($data);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }
}
