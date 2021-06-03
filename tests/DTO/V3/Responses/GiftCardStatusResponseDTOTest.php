<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\GiftCardStatusResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class GiftCardStatusResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class GiftCardStatusResponseDTOTest extends DTOTest
{
    /**
     * @var GiftCardStatusResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = GiftCardStatusResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids' => ['someField' => 'someValue'],
        ];
        $this->dto = new GiftCardStatusResponseDTO($data);
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
}
