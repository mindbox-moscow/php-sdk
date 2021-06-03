<?php

namespace Mindbox\Tests\DTO\V3\Requests;

use Mindbox\DTO\V3\Requests\ProductRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class ProductRequestDTOTest
 *
 * @package Mindbox\Tests\DTO\V3\Requests
 */
class ProductRequestDTOTest extends DTOTest
{
    /**
     * @var ProductRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = ProductRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'          => ['someField' => 'someValue'],
            'price'        => 'some_price',
            'categories'   => ['some_category' => 'some_categoryValue'],
            'name'         => 'some_name',
            'description'  => 'some_description',
            'isAvailable'  => 'some_isAvailable',
            'oldPrice'     => 'some_oldPrice',
            'shelfLife'    => 'some_shelfLife',
            'url'          => 'some_url',
            'pictureUrl'   => 'some_pictureUrl',
            'customFields' => ['someField' => 'someValue'],
        ];
        $this->dto = new ProductRequestDTO($data);
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

    public function testGetPrice()
    {
        $field = $this->dto->getPrice();

        $this->assertSame('some_price', $field);
    }

    public function testSetPrice()
    {
        $this->dto->setPrice('new_price');
        $field = $this->dto->getPrice();

        $this->assertSame('new_price', $field);
    }

    public function testGetCategories()
    {
        $field = $this->dto->getCategories();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\CategoryRequestCollection::class, $field);
    }

    public function testSetCategories()
    {
        $this->dto->setCategories([['category' => 'some_category']]);
        $field = $this->dto->getCategories();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Requests\CategoryRequestCollection::class, $field);
    }

    public function testGetName()
    {
        $field = $this->dto->getName();

        $this->assertSame('some_name', $field);
    }

    public function testSetName()
    {
        $this->dto->setName('new_name');
        $field = $this->dto->getName();

        $this->assertSame('new_name', $field);
    }

    public function testGetDescription()
    {
        $field = $this->dto->getDescription();

        $this->assertSame('some_description', $field);
    }

    public function testSetDescription()
    {
        $this->dto->setDescription('new_description');
        $field = $this->dto->getDescription();

        $this->assertSame('new_description', $field);
    }

    public function testGetIsAvailable()
    {
        $field = $this->dto->getIsAvailable();

        $this->assertSame('some_isAvailable', $field);
    }

    public function testSetIsAvailable()
    {
        $this->dto->setIsAvailable('new_isAvailable');
        $field = $this->dto->getIsAvailable();

        $this->assertSame('new_isAvailable', $field);
    }

    public function testGetOldPrice()
    {
        $field = $this->dto->getOldPrice();

        $this->assertSame('some_oldPrice', $field);
    }

    public function testSetOldPrice()
    {
        $this->dto->setOldPrice('new_oldPrice');
        $field = $this->dto->getOldPrice();

        $this->assertSame('new_oldPrice', $field);
    }

    public function testGetShelfLife()
    {
        $field = $this->dto->getShelfLife();

        $this->assertSame('some_shelfLife', $field);
    }

    public function testSetShelfLife()
    {
        $this->dto->setShelfLife('new_shelfLife');
        $field = $this->dto->getShelfLife();

        $this->assertSame('new_shelfLife', $field);
    }

    public function testGetUrl()
    {
        $field = $this->dto->getUrl();

        $this->assertSame('some_url', $field);
    }

    public function testSetUrl()
    {
        $this->dto->setUrl('new_url');
        $field = $this->dto->getUrl();

        $this->assertSame('new_url', $field);
    }

    public function testGetPictureUrl()
    {
        $field = $this->dto->getPictureUrl();

        $this->assertSame('some_pictureUrl', $field);
    }

    public function testSetPictureUrl()
    {
        $this->dto->setPictureUrl('new_pictureUrl');
        $field = $this->dto->getPictureUrl();

        $this->assertSame('new_pictureUrl', $field);
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
}
