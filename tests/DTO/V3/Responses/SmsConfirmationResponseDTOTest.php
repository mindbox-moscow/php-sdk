<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\SmsConfirmationResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class SmsConfirmationResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class SmsConfirmationResponseDTOTest extends DTOTest
{
    /**
     * @var \Mindbox\DTO\V3\Responses\SmsConfirmationResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = SmsConfirmationResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'processingStatus' => 'some_processingStatus',
        ];
        $this->dto = new SmsConfirmationResponseDTO($data);
    }

    public function testGetProcessingStatus()
    {
        $field = $this->dto->getProcessingStatus();

        $this->assertSame('some_processingStatus', $field);
    }
}
