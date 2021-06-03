<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\PreorderRequestDTO;

/**
 * Class PreorderRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class PreorderRequestDTOTest extends OrderRequestDTOTest
{
    /**
     * @var PreorderRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = PreorderRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'                    => ['someField' => 'someValue'],
            'pointOfContact'         => 'some_pointOfContact',
            'area'                   => 'some_area',
            'customer'               => ['someField' => 'someValue'],
            'discounts'              => [['someField' => 'someValue']],
            'deliveryCost'           => 'some_deliveryCost',
            'customFields'           => ['someField' => 'someValue'],
            'lines'                  => [['someField' => 'someValue']],
            'payments'               => [['someField' => 'someValue']],
            'calculationDateTimeUtc' => 'some_calculationDateTimeUtc',
        ];
        $this->dto = new PreorderRequestDTO($data);
    }

    public function testGetCalculationDateTimeUtc()
    {
        $field = $this->dto->getCalculationDateTimeUtc();

        $this->assertSame('some_calculationDateTimeUtc', $field);
    }

    public function testSetCalculationDateTimeUtc()
    {
        $this->dto->setCalculationDateTimeUtc('new_calculationDateTimeUtc');
        $field = $this->dto->getCalculationDateTimeUtc();

        $this->assertSame('new_calculationDateTimeUtc', $field);
    }
}
