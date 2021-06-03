<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CustomerIdentityResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CustomerIdentityResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class CustomerIdentityResponseDTOTest extends DTOTest
{
    /**
     * @var CustomerIdentityResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = CustomerIdentityResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'              => ['someField' => 'someValue'],
            'processingStatus' => 'some_processingStatus',
        ];
        $this->dto = new CustomerIdentityResponseDTO($data);
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

    public function testGetProcessingStatus()
    {
        $field = $this->dto->getProcessingStatus();

        $this->assertSame('some_processingStatus', $field);
    }
}
