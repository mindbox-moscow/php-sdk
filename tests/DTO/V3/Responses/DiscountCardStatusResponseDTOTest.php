<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\DiscountCardStatusResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class DiscountCardStatusResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class DiscountCardStatusResponseDTOTest extends DTOTest
{
    /**
     * @var DiscountCardStatusResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = DiscountCardStatusResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'         => ['someField' => 'someValue'],
            'dateTimeUtc' => 'some_dateTimeUtc',
        ];
        $this->dto = new DiscountCardStatusResponseDTO($data);
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

    public function testGetDateTimeUtc()
    {
        $field = $this->dto->getDateTimeUtc();

        $this->assertSame('some_dateTimeUtc', $field);
    }
}
