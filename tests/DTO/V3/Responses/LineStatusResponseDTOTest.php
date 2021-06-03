<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\LineStatusResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class LineStatusResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class LineStatusResponseDTOTest extends DTOTest
{
    /**
     * @var LineStatusResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = LineStatusResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids' => ['someField' => 'someValue'],
        ];
        $this->dto = new LineStatusResponseDTO($data);
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
