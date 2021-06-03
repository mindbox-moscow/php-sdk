<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CustomerSegmentationResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CustomerSegmentationResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class CustomerSegmentationResponseDTOTest extends DTOTest
{
    /**
     * @var CustomerSegmentationResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = CustomerSegmentationResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'segmentation' => ['someField' => 'someValue'],
            'segment'      => ['someField' => 'someValue'],
        ];
        $this->dto = new CustomerSegmentationResponseDTO($data);
    }

    public function testGetSegmentation()
    {
        $field = $this->dto->getSegmentation();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\SegmentationResponseDTO::class, $field);
    }

    public function testGetSegment()
    {
        $field = $this->dto->getSegment();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\SegmentResponseDTO::class, $field);
    }
}
