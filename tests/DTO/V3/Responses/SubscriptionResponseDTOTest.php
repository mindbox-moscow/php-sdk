<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\SubscriptionResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class SubscriptionResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class SubscriptionResponseDTOTest extends DTOTest
{
    /**
     * @var SubscriptionResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = SubscriptionResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'pointOfContact' => 'some_pointOfContact',
            'topic'          => 'some_topic',
            'isSubscribed'   => 'some_isSubscribed',
            'brand'          => 'some_brand',
        ];
        $this->dto = new SubscriptionResponseDTO($data);
    }

    public function testGetPointOfContact()
    {
        $field = $this->dto->getPointOfContact();

        $this->assertSame('some_pointOfContact', $field);
    }

    public function testGetTopic()
    {
        $field = $this->dto->getTopic();

        $this->assertSame('some_topic', $field);
    }

    public function testGetIsSubscribed()
    {
        $field = $this->dto->getIsSubscribed();

        $this->assertSame('some_isSubscribed', $field);
    }

    public function testGetBrand()
    {
        $field = $this->dto->getBrand();

        $this->assertSame('some_brand', $field);
    }
}
