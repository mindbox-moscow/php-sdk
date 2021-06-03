<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CategoryResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CategoryResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class CategoryResponseDTOTest extends DTOTest
{
    /**
     * @var CategoryResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = CategoryResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids' => ['someField' => 'someValue'],
        ];
        $this->dto = new CategoryResponseDTO($data);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }
}
