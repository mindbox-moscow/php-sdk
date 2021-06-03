<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\IssuedCouponResponseDTO;

/**
 * Class IssuedCouponResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class IssuedCouponResponseDTOTest extends CouponResponseDTOTest
{
    /**
     * @var IssuedCouponResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = IssuedCouponResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'         => ['someField' => 'someValue'],
            'pool'        => [['someField' => 'someValue'],],
        ];
        $this->dto = new IssuedCouponResponseDTO($data);
    }
}
