<?php

namespace Mindbox\Tests\DTO;

use Mindbox\DTO\DTO;
use Mindbox\DTO\DTOCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class DTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class DTOTest extends TestCase
{
    /**
     * @var string $dtoClassName
     */
    protected $dtoClassName = DTO::class;

    /**
     * @param array $items
     *
     * @return DTO
     */
    protected function getDto($items = [])
    {
        return new $this->dtoClassName($items);
    }

    /**
     * @return string
     */
    protected function getXmlName()
    {
        return (new $this->dtoClassName)->getXmlName();
    }

    /**
     *
     */
    public function getFieldsProvider()
    {
        return [
            [
                [
                    'name'           => 'Andrew',
                    'age'            => 33,
                    'someField'      => true,
                    'someArrayField' => ['field' => 'value'],
                    $this->getDto(['dto' => 'value']),
                ],
            ],
            [
                [
                    'name'      => 'Andrew',
                    'age'       => 33,
                    'someField' => true,
                    33          => '345',
                ],
            ],
            [
                [
                    [
                        'field' => 'value',
                    ],
                    [
                        'field2' => 'value2',
                    ],
                    DTO::XML_ITEM_NAME_INDEX => 'someKey',
                ],
            ],
        ];
    }

    /**
     *
     */
    public function asArrayFieldsProvider()
    {
        return [
            [
                [
                    'name'           => 'Andrew',
                    'age'            => 33,
                    'someField'      => true,
                    'someArrayField' => ['field' => 'value'],
                    'dto'            => $this->getDto(['dto' => 'value']),
                ],
                [
                    $this->getXmlName() => [
                        'name'           => 'Andrew',
                        'age'            => 33,
                        'someField'      => true,
                        'someArrayField' => ['field' => 'value'],
                        'dto'            => ['dto' => 'value'],
                    ],
                ],
            ],
            [
                ['name' => 'Andrew', 'age' => 33, 'someField' => true, 33 => '345'],
                [
                    $this->getXmlName() => [
                        'name'      => 'Andrew',
                        'age'       => 33,
                        'someField' => true,
                        33          => '345',
                    ],
                ],
            ],
        ];
    }

    /**
     *
     */
    public function asJsonFieldsProvider()
    {
        return [
            [
                [
                    'name'           => 'Andrew',
                    'age'            => 33,
                    'someField'      => true,
                    'someArrayField' => ['field' => 'value'],
                    'someDtoField'   => $this->getDto(['dto' => 'value']),
                ],
                '{"name":"Andrew","age":33,"someField":true,"someArrayField":{"field":"value"},"someDtoField":{"dto":"value"}}',
            ],
            [
                ['name' => 'Andrew', 'age' => 33, 'someField' => true, 33 => '345'],
                '{"name":"Andrew","age":33,"someField":true,"33":"345"}',
            ],
            [
                [
                    'orders' => [
                        'order' => [
                            [
                                'ids'                   => [
                                    'mindbox'       => '189',
                                    'transactionId' => '0000001282018244543',
                                ],
                                'createdPointOfContact' => '244543',
                                'createdDateTimeUtc'    => '2018-09-28 10:35:57',
                                'lines'                 => [
                                    [
                                        'quantity'        => '1',
                                        'discountedPrice' => '45',
                                    ],
                                    [
                                        'quantity'        => '2',
                                        'discountedPrice' => '145',
                                    ],
                                ],
                            ],
                            [
                                'ids'                   => [
                                    'mindbox'       => '188',
                                    'transactionId' => '0000001272018244543',
                                ],
                                'createdPointOfContact' => '244543',
                                'createdDateTimeUtc'    => '2018-09-28 10:34:12',
                            ],
                        ],
                    ],
                ],
                '{"orders":{"order":[{"ids":{"mindbox":"189","transactionId":"0000001282018244543"},"createdPointOfContact":"244543","createdDateTimeUtc":"2018-09-28 10:35:57","lines":[{"quantity":"1","discountedPrice":"45"},{"quantity":"2","discountedPrice":"145"}]},{"ids":{"mindbox":"188","transactionId":"0000001272018244543"},"createdPointOfContact":"244543","createdDateTimeUtc":"2018-09-28 10:34:12"}]}}',
            ],
        ];
    }

    /**
     *
     */
    public function asXmlFieldsProvider()
    {
        return [
            [
                [
                    'name'           => 'Andrew',
                    'age'            => 33,
                    'someField'      => true,
                    'someArrayField' => ['field' => 'value'],
                    'someDtoField'   => $this->getDto(['dto' => 'value']),
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><name>Andrew</name><age>33</age><someField>true</someField><someArrayField><field>value</field></someArrayField><someDtoField><dto>value</dto></someDtoField></' . $this->getXmlName() . '>
',
            ],
            [
                ['name' => 'Andrew', 'age' => 33, 'someField' => true, 33 => '345'],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><name>Andrew</name><age>33</age><someField>true</someField><value>345</value></' . $this->getXmlName() . '>
',
            ],
            [
                [
                    'orders' => [
                        [
                            'ids'                   => [
                                'mindbox'       => '189',
                                'transactionId' => '0000001282018244543',
                            ],
                            'createdPointOfContact' => '244543',
                            'createdDateTimeUtc'    => '2018-09-28 10:35:57',
                            'lines'                 => [
                                [
                                    'quantity'        => '1',
                                    'discountedPrice' => '45',
                                ],
                                [
                                    'quantity'        => '2',
                                    'discountedPrice' => '145',
                                ],
                                DTO::XML_ITEM_NAME_INDEX => 'line',
                            ],
                        ],
                        [
                            'ids'                   => [
                                'mindbox'       => '188',
                                'transactionId' => '0000001272018244543',
                            ],
                            'createdPointOfContact' => '244543',
                            'createdDateTimeUtc'    => '2018-09-28 10:34:12',
                        ],
                        DTO::XML_ITEM_NAME_INDEX => 'order',
                    ],
                ],
                '<?xml version="1.0" encoding="utf-8"?>
<' . $this->getXmlName() . '><orders><order><ids><mindbox>189</mindbox><transactionId>0000001282018244543</transactionId></ids><createdPointOfContact>244543</createdPointOfContact><createdDateTimeUtc>2018-09-28 10:35:57</createdDateTimeUtc><lines><line><quantity>1</quantity><discountedPrice>45</discountedPrice></line><line><quantity>2</quantity><discountedPrice>145</discountedPrice></line></lines></order><order><ids><mindbox>188</mindbox><transactionId>0000001272018244543</transactionId></ids><createdPointOfContact>244543</createdPointOfContact><createdDateTimeUtc>2018-09-28 10:34:12</createdDateTimeUtc></order></orders></' . $this->getXmlName() . '>
',
            ],
        ];
    }

    /**
     *
     */
    public function setFieldsProvider()
    {
        return [
            [
                'name',
                'Andrew',
            ],
            [
                'age',
                33,
            ],
            [
                'someField',
                true,
            ],
            [
                'someArrayField',
                ['field' => 'value'],
            ],
            [
                'someDTOField',
                $this->getDto(),
            ],
        ];
    }

    /**
     *
     */
    public function testConstructDto()
    {
        $items = [
            'result'   => 'value',
            'messages' => [
                'message1' => 'text1',
                'message2' => 'text2',
            ],
            'customer' => [
                'phone' => 'text1',
            ],
        ];
        $dto   = $this->getDto($items);

        $this->assertInstanceOf($this->dtoClassName, $dto);
    }

    /**
     * @dataProvider getFieldsProvider
     *
     * @param array $items
     */
    public function testGetField($items)
    {
        $dto = $this->getDto($items);

        foreach ($items as $key => $value) {
            $this->assertSame($value, $dto->getField($key));
        }

        $this->assertSame(null, $dto->getField('unknownField'));
        $this->assertSame('defaultValue', $dto->getField('unknownField', 'defaultValue'));
    }

    public function testGetFieldForDto()
    {
        $dto = $this->getDto([
            'collection' => new DTOCollection([
                ['item' => 'value'],
                DTO::XML_ITEM_NAME_INDEX => 'someKey',
            ]),
        ]);

        $this->assertInstanceOf(DTOCollection::class, $dto->getField('collection'));
        $this->assertArrayNotHasKey(DTO::XML_ITEM_NAME_INDEX, $dto->getField('collection'));
    }

    /**
     * @dataProvider setFieldsProvider
     *
     * @param string $key
     * @param mixed  $item
     */
    public function testSetField($key, $item)
    {
        $dto = $this->getDto([]);

        $dto->setField($key, $item);

        $this->assertSame($item, $dto->getField($key));
    }

    /**
     * @dataProvider getFieldsProvider
     *
     * @param array $items
     */
    public function testGetFieldNames($items)
    {
        $dto = $this->getDto($items);
        unset($items[DTO::XML_ITEM_NAME_INDEX]);

        $expected = array_keys($items);
        $this->assertSame($expected, $dto->getFieldNames());
    }

    /**
     * @dataProvider getFieldsProvider
     *
     * @param array $items
     */
    public function testAll($items)
    {
        $dto = $this->getDto($items);
        unset($items[DTO::XML_ITEM_NAME_INDEX]);

        $this->assertSame($items, $dto->all());
    }

    /**
     * @dataProvider asJsonFieldsProvider
     *
     * @param array  $items
     * @param string $asJson
     */
    public function testToJson($items, $asJson)
    {
        $dto = $this->getDto($items);

        $this->assertSame($asJson, $dto->toJson());
    }

    /**
     * @dataProvider asArrayFieldsProvider
     *
     * @param array $items
     * @param array $asArray
     */
    public function testGetFieldsAsArray($items, $asArray)
    {
        $dto = $this->getDto($items);

        $this->assertSame($asArray[$this->getXmlName()], $dto->getFieldsAsArray());
    }

    /**
     * @dataProvider asXmlFieldsProvider
     *
     * @param array  $items
     * @param string $asXml
     */
    public function testToXML($items, $asXml)
    {
        $dto = $this->getDto($items);

        $this->assertSame($asXml, $dto->toXML());
    }

    /**
     * @dataProvider getFieldsProvider
     *
     * @param array $items
     */
    public function testCount($items)
    {
        $dto = $this->getDto($items);

        unset($items[DTO::XML_ITEM_NAME_INDEX]);

        $count = count($items);
        $this->assertSame($count, count($dto));
        $this->assertSame($count, $dto->count());
    }

    /**
     *
     */
    public function testGetDTOMap()
    {
        $dto = $this->getDto();

        $this->assertIsArray($dto::getDTOMap());
    }

    /**
     *
     */
    public function testGetIterator()
    {
        $dto = $this->getDto();

        $this->assertInstanceOf(\ArrayIterator::class, $dto->getIterator());
    }

    /**
     *
     */
    public function testGetXmlName()
    {
        $dto = $this->getDto();

        $this->assertIsString($dto->getXmlName());
    }

    /**
     *
     */
    public function testOffsetExists()
    {
        $dto = $this->getDto(['key' => 'value']);

        $this->assertTrue($dto->offsetExists('key'));
        $this->assertFalse($dto->offsetExists('otherKey'));
    }

    public function testOffsetGet()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxException::class);

        $dto = $this->getDto(['key' => 'value']);

        $this->assertSame('value', $dto->offsetGet('key'));
        $dto->offsetGet('otherKey');
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxException
     */
    public function testOffsetSet()
    {
        $dto = $this->getDto(['key' => 'value']);

        $dto->offsetSet('otherKey', 'otherValue');

        $this->assertSame('otherValue', $dto->offsetGet('otherKey'));

        $dto->offsetSet(null, 'newValue');
        $arr = $dto->getFieldsAsArray();
        end($arr);

        $this->assertSame('newValue', $dto->offsetGet(key($arr)));
    }

    public function testOffsetUnset()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxException::class);

        $dto = $this->getDto(['key' => 'value']);

        $dto->offsetUnset('key');

        $dto->offsetGet('key');
    }
}
