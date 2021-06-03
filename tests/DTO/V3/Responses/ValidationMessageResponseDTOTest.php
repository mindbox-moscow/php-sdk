<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\ValidationMessageResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ValidationMessageResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class ValidationMessageResponseDTOTest extends DTOTest
{
    /**
     * @var ValidationMessageResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = ValidationMessageResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'message'  => 'some_message',
            'location' => 'some_location',
        ];
        $this->dto = new ValidationMessageResponseDTO($data);
    }

    public function testGetMessage()
    {
        $field = $this->dto->getMessage();

        $this->assertSame('some_message', $field);
    }

    public function testGetLocation()
    {
        $field = $this->dto->getLocation();

        $this->assertSame('some_location', $field);
    }
}
