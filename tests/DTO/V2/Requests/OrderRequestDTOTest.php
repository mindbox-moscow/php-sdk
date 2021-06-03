<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\OrderRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class OrderRequestDTOTest
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class OrderRequestDTOTest extends DTOTest
{
    /**
     * @var OrderRequestDTO $dto
     */
    public $dto;

    /**
     * @var string
     */
    protected $dtoClassName = OrderRequestDTO::class;

    /**
     *
     */
    public function asJsonFieldsProvider()
    {
        return array_merge(parent::asJsonFieldsProvider(), [
            [
                [
                    'ids'  => [
                        'someField'  => 'someValue',
                        'otherField' => 'otherValue',
                    ],
                    'area' => [
                        'someField' => 'someValue',
                    ],
                ],
                '{"ids":{"someField":"someValue","otherField":"otherValue"},"area":{"someField":"someValue"}}',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'line',
                        ],
                        [
                            'someField2' => 'someValue2',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'line',
                        ],
                    ],
                ],
                '{"lines":[{"someField":"someValue"},{"someField2":"someValue2"}]}',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'line',
                        ],
                    ],
                ],
                '{"lines":[{"someField":"someValue"}]}',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                        ],
                        [
                            'someField2' => 'someValue2',
                        ],
                    ],
                ],
                '{"lines":[{"someField":"someValue"},{"someField2":"someValue2"}]}',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                        ],
                    ],
                ],
                '{"lines":[{"someField":"someValue"}]}',
            ],
            [
                [
                    'customFields' => [
                        'someField'      => 'someValue',
                        'someArrayField' => [
                            'someValue',
                            'someValue2',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'value',
                        ],
                    ],
                ],
                '{"customFields":{"someField":"someValue","someArrayField":["someValue","someValue2"]}}',
            ],
            [
                [
                    'customFields' => [
                        'someField'      => 'someValue',
                        'someArrayField' => [
                            'someValue',
                            'someValue2',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'value',
                        ],
                    ],
                ],
                '{"customFields":{"someField":"someValue","someArrayField":["someValue","someValue2"]}}',
            ],
            [
                [
                    'customFields' => [
                        'someField' => 'someValue',
                    ],
                ],
                '{"customFields":{"someField":"someValue"}}',
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
                    'ids'  => [
                        'someField'  => 'someValue',
                        'otherField' => 'otherValue',
                    ],
                    'area' => [
                        'someField' => 'someValue',
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><ids><someField>someValue</someField><otherField>otherValue</otherField></ids><area><someField>someValue</someField></area></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                        ],
                        [
                            'someField2' => 'someValue2',
                        ],
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><lines><line><someField>someValue</someField></line><line><someField2>someValue2</someField2></line></lines></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                        ],
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><lines><line><someField>someValue</someField></line></lines></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'line',
                        ],
                        [
                            'someField2' => 'someValue2',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'line',
                        ],
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><lines><line><someField>someValue</someField></line><line><someField2>someValue2</someField2></line></lines></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'lines' => [
                        [
                            'someField' => 'someValue',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'line',
                        ],
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><lines><line><someField>someValue</someField></line></lines></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'customFields' => [
                        'someField'      => 'someValue',
                        'someArrayField' => [
                            'someValue',
                            'someValue2',
                        ],
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><customFields><someField>someValue</someField><someArrayField><value>someValue</value><value>someValue2</value></someArrayField></customFields></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'customFields' => [
                        'someField'      => 'someValue',
                        'someArrayField' => [
                            'someValue',
                            'someValue2',
                            OrderRequestDTO::XML_ITEM_NAME_INDEX => 'value',
                        ],
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><customFields><someField>someValue</someField><someArrayField><value>someValue</value><value>someValue2</value></someArrayField></customFields></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'customFields' => [
                        'someField' => 'someValue',
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><customFields><someField>someValue</someField></customFields></' . $this->getXmlName() . '>
',
            ],
        ]);
    }

    public function setUp(): void
    {
        $data      = [
            'ids'            => ['someField' => 'someValue'],
            'pointOfContact' => 'some_pointOfContact',
            'area'           => 'some_area',
            'customer'       => ['someField' => 'someValue'],
            'discounts'      => [['someField' => 'someValue']],
            'deliveryCost'   => 'some_deliveryCost',
            'customFields'   => ['someField' => 'someValue'],
            'lines'          => [['someField' => 'someValue']],
            'payments'       => [['someField' => 'someValue']],
        ];
        $this->dto = new OrderRequestDTO($data);
    }

    public function testGetIds()
    {
        $field = $this->dto->getIds();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testSetIds()
    {
        $this->dto->setIds(['bitrixId' => 'some_bitrixId']);
        $field = $this->dto->getIds();

        $this->assertSame(['bitrixId' => 'some_bitrixId'], $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);
    }

    public function testSetId()
    {
        $field = $this->dto->getId('someField');

        $this->assertSame('someValue', $field);

        $this->dto->setId('new_bitrixId', 'new_bitrixId_val');
        $field = $this->dto->getId('new_bitrixId');

        $this->assertSame('new_bitrixId_val', $field);
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

    public function testGetArea()
    {
        $field = $this->dto->getArea();

        $this->assertSame('some_area', $field);
    }

    public function testSetArea()
    {
        $this->dto->setArea('new_area');
        $field = $this->dto->getArea();

        $this->assertSame('new_area', $field);
    }

    public function testGetCustomer()
    {
        $field = $this->dto->getCustomer();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\CustomerRequestDTO::class, $field);
    }

    public function testSetCustomer()
    {
        $this->dto->setCustomer(['middleName' => 'some_middleName']);
        $field = $this->dto->getCustomer();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\CustomerRequestDTO::class, $field);
        $this->assertSame('some_middleName', $field->getMiddleName());
    }

    public function testGetDiscounts()
    {
        $field = $this->dto->getDiscounts();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\DiscountRequestCollection::class, $field);
    }

    public function testSetDiscounts()
    {
        $this->dto->setDiscounts([['middleName' => 'some_middleName']]);
        $field = $this->dto->getDiscounts();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\DiscountRequestCollection::class, $field);
    }

    public function testGetDeliveryCost()
    {
        $field = $this->dto->getDeliveryCost();

        $this->assertSame('some_deliveryCost', $field);
    }

    public function testSetDeliveryCost()
    {
        $this->dto->setDeliveryCost('new_deliveryCost');
        $field = $this->dto->getDeliveryCost();

        $this->assertSame('new_deliveryCost', $field);
    }

    public function testGetCustomFields()
    {
        $field = $this->dto->getCustomFields();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testSetCustomFields()
    {
        $setField = ['customField' => ['topic' => 'some_topic']];
        $this->dto->setCustomFields($setField);
        $field = $this->dto->getCustomFields();

        $this->assertSame($setField, $field);
    }

    public function testGetCustomField()
    {
        $field = $this->dto->getCustomField('someField');

        $this->assertSame('someValue', $field);
    }

    public function testSetCustomField()
    {
        $this->dto->setCustomField('customField', ['some_topic']);
        $field = $this->dto->getCustomField('customField');

        $this->assertSame(['some_topic'], $field);
    }

    public function testGetLines()
    {
        $field = $this->dto->getLines();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\LineRequestCollection::class, $field);
    }

    public function testSetLines()
    {
        $this->dto->setLines([['line' => 'some_line']]);
        $field = $this->dto->getLines();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\LineRequestCollection::class, $field);
    }

    public function testGetPayments()
    {
        $field = $this->dto->getPayments();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\PaymentRequestCollection::class, $field);
    }

    public function testSetPayments()
    {
        $this->dto->setPayments([['payment' => 'some_payment']]);
        $field = $this->dto->getPayments();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\PaymentRequestCollection::class, $field);
    }
}
