<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\ActionTemplateResponseDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ActionTemplateResponseDTOTest
 * @package Mindbox\Tests\DTO\V3\Responses
 */
class ActionTemplateResponseDTOTest extends DTOTest
{
    /**
     * @var ActionTemplateResponseDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = ActionTemplateResponseDTO::class;

    /**
     *
     */
    public function asJsonFieldsProvider()
    {
        return array_merge(parent::asJsonFieldsProvider(), [
            [
                [
                    'systemName' => 'Andrew',
                    'name'       => 33,
                ],
                '{"systemName":"Andrew","name":33}',
            ],
        ]);
    }

    /**
     *
     */
    public function asXmlFieldsProvider()
    {
        return array_merge(parent::asXmlFieldsProvider(), [
            [
                [
                    'systemName' => 'Andrew',
                    'name'       => 33,
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><systemName>Andrew</systemName><name>33</name></' . $this->getXmlName() . '>
',
            ],
        ]);
    }

    public function setUp(): void
    {
        $data      = [
            'systemName' => 'some_systemName',
            'name'       => 'some_name',
        ];
        $this->dto = new ActionTemplateResponseDTO($data);
    }

    public function testGetSystemName()
    {
        $field = $this->dto->getSystemName();

        $this->assertSame('some_systemName', $field);
    }

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }
}
