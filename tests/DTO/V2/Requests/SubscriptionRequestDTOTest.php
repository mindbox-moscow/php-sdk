<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\SubscriptionRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class SubscriptionRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class SubscriptionRequestDTOTest extends DTOTest
{
    /**
     * @var SubscriptionRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = SubscriptionRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'pointOfContact' => 'some_pointOfContact',
            'topic'          => 'some_topic',
            'isSubscribed'   => 'some_isSubscribed',
            'valueByDefault' => 'some_valueByDefault',
            'brand'          => 'some_brand',
        ];
        $this->dto = new SubscriptionRequestDTO($data);
    }

    public function testGetPointOfContact()
    {
        $field = $this->dto->getPointOfContact();

        $this->assertSame('some_pointOfContact', $field);
    }

    public function testSetPointOfContact()
    {
        $this->dto->setPointOfContact('new_pointOfContact');
        $field = $this->dto->getPointOfContact();

        $this->assertSame('new_pointOfContact', $field);
    }

    public function testGetTopic()
    {
        $field = $this->dto->getTopic();

        $this->assertSame('some_topic', $field);
    }

    public function testSetTopic()
    {
        $this->dto->setTopic('new_topic');
        $field = $this->dto->getTopic();

        $this->assertSame('new_topic', $field);
    }

    public function testGetIsSubscribed()
    {
        $field = $this->dto->getIsSubscribed();

        $this->assertSame('some_isSubscribed', $field);
    }

    public function testSetIsSubscribed()
    {
        $this->dto->setIsSubscribed('new_isSubscribed');
        $field = $this->dto->getIsSubscribed();

        $this->assertSame('new_isSubscribed', $field);
    }

    public function testGetBrand()
    {
        $field = $this->dto->getBrand();

        $this->assertSame('some_brand', $field);
    }

    public function testSetBrand()
    {
        $this->dto->setBrand('new_brand');
        $field = $this->dto->getBrand();

        $this->assertSame('new_brand', $field);
    }
}
