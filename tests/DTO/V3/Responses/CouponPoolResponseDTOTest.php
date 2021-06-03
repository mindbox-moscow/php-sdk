<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CouponPoolResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CouponPoolResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class CouponPoolResponseDTOTest extends DTOTest
{
    /**
     * @var CouponPoolResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = CouponPoolResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'         => ['someField' => 'someValue'],
            'name'        => 'some_name',
            'description' => 'some_description',
        ];
        $this->dto = new CouponPoolResponseDTO($data);
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
