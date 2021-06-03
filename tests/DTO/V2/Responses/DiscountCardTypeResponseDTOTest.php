<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\DiscountCardTypeResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class DiscountCardTypeResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class DiscountCardTypeResponseDTOTest extends DTOTest
{
    /**
     * @var DiscountCardTypeResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = DiscountCardTypeResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'id' => 'some_id',
        ];
        $this->dto = new DiscountCardTypeResponseDTO($data);
    }

    public function testGetId()
    {
        $field = $this->dto->getId();

        $this->assertSame('some_id', $field);
    }
}
