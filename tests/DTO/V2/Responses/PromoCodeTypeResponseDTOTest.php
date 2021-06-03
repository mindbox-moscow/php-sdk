<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PromoCodeTypeResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PromoCodeTypeResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PromoCodeTypeResponseDTOTest extends DTOTest
{
    /**
     * @var PromoCodeTypeResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PromoCodeTypeResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'         => ['someField' => 'someValue'],
            'name'        => 'some_name',
            'description' => 'some_description',
        ];
        $this->dto = new PromoCodeTypeResponseDTO($data);
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

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }

    public function testGetDescription()
    {
        $field = $this->dto->getDescription();

        $this->assertSame('some_description', $field);
    }
}
