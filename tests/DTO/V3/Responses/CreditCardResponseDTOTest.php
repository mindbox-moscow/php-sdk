<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CreditCardResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CreditCardResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class CreditCardResponseDTOTest extends DTOTest
{
    /**
     * @var CreditCardResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = CreditCardResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'hash' => 'some_hash',
        ];
        $this->dto = new CreditCardResponseDTO($data);
    }

    public function testGetHash()
    {
        $field = $this->dto->getHash();

        $this->assertSame('some_hash', $field);
    }
}
