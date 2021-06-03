<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PossibleDiscountsValueItemResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PossibleDiscountsValueItemResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PossibleDiscountsValueItemResponseDTOTest extends DTOTest
{
    /**
     * @var PossibleDiscountsValueItemResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PossibleDiscountsValueItemResponseDTO::class;

    public function setUp(): void
    {
        $data      = [

        ];
        $this->dto = new PossibleDiscountsValueItemResponseDTO($data);
    }
}
