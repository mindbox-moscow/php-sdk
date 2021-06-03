<?php

namespace Mindbox\Tests\DTO\V2\Responses;

use Mindbox\DTO\V2\Responses\PromoCodeResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class PromoCodeResponseDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Responses
 */
class PromoCodeResponseDTOTest extends DTOTest
{
    /**
     * @var PromoCodeResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PromoCodeResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'id'                       => 'some_id',
            'status'                   => 'some_status',
            'type'                     => ['name' => 'some_name'],
            'availableFromDateTimeUtc' => 'some_availableFromDateTimeUtc',
            'availableTillDateTimeUtc' => 'some_availableTillDateTimeUtc',
            'usedDateTimeUtc'          => 'some_usedDateTimeUtc',
        ];
        $this->dto = new PromoCodeResponseDTO($data);
    }

    public function testGetId()
    {
        $field = $this->dto->getId();

        $this->assertSame('some_id', $field);
    }

    public function testGetStatus()
    {
        $field = $this->dto->getStatus();

        $this->assertSame('some_status', $field);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Responses\PromoCodeTypeResponseDTO::class, $field);
        $this->assertSame('some_name', $field->getName());
    }

    public function testGetAvailableFromDateTimeUtc()
    {
        $field = $this->dto->getAvailableFromDateTimeUtc();

        $this->assertSame('some_availableFromDateTimeUtc', $field);
    }

    public function testGetAvailableTillDateTimeUtc()
    {
        $field = $this->dto->getAvailableTillDateTimeUtc();

        $this->assertSame('some_availableTillDateTimeUtc', $field);
    }

    public function testGetUsedDateTimeUtc()
    {
        $field = $this->dto->getUsedDateTimeUtc();

        $this->assertSame('some_usedDateTimeUtc', $field);
    }
}
