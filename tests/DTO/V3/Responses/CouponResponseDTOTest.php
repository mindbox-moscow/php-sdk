<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CouponResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CouponResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class CouponResponseDTOTest extends DTOTest
{
    /**
     * @var CouponResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = CouponResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'         => ['someField' => 'someValue'],
            'pool'        => [['someField' => 'someValue'],],
        ];
        $this->dto = new CouponResponseDTO($data);
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

    public function testGetPool()
    {
        $field = $this->dto->getPool();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\CouponPoolResponseDTO::class, $field);
    }
}
