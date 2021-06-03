<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\SmsConfirmationRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class SmsConfirmationRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class SmsConfirmationRequestDTOTest extends DTOTest
{
    /**
     * @var \Mindbox\DTO\SmsConfirmationRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = SmsConfirmationRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'code' => 'some_code',
        ];
        $this->dto = new SmsConfirmationRequestDTO($data);
    }

    public function testGetCode()
    {
        $field = $this->dto->getCode();

        $this->assertSame('some_code', $field);
    }

    public function testSetCode()
    {
        $this->dto->setCode('new_code');
        $field = $this->dto->getCode();

        $this->assertSame('new_code', $field);
    }
}
