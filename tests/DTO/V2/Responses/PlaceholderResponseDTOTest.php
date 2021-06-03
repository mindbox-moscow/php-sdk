<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PlaceholderResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PlaceholderResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PlaceholderResponseDTOTest extends DTOTest
{
    /**
     * @var PlaceholderResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PlaceholderResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'id'      => 'some_id',
            'content' => [['contentItem']],
        ];
        $this->dto = new PlaceholderResponseDTO($data);
    }

    public function testGetId()
    {
        $field = $this->dto->getId();

        $this->assertSame('some_id', $field);
    }

    public function testGetContent()
    {
        $field = $this->dto->getContent();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\ContentItemResponseCollection::class, $field);
    }
}
