<?php


namespace Mindbox\DTO\V3\Requests;

use Mindbox\DTO\V3\ProductDTO;

/**
 * Class ProductRequestDTO
 *
 * @package Mindbox\DTO\V3\Requests
 * @property CategoryRequestCollection $categories
 **/
class ProductRequestDTO extends ProductIdentityRequestDTO
{
    use ProductDTO, CustomFieldRequestDTO;

    /**
     * @var array Мэппинг преобразрования полей в объекты DTO.
     */
    protected static $DTOMap = [
        'categories' => CategoryRequestCollection::class,
    ];

    /**
     * @return CategoryRequestCollection
     */
    public function getCategories()
    {
        return $this->getField('categories');
    }

    /**
     * @param array|CategoryRequestCollection $categories
     */
    public function setCategories($categories)
    {
        $this->setField('categories', $categories);
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->setField('price', $price);
    }

    /**
     * @param mixed $price
     */
    public function setPricePerItem($price)
    {
        $this->setField('pricePerItem', $price);
    }

    /**
     * @param mixed $price
     */
    public function setPriceOfLine($price)
    {
        $this->setField('priceOfLine', $price);
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->setField('name', $name);
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->setField('description', $description);
    }

    /**
     * @param mixed $isAvailable
     */
    public function setIsAvailable($isAvailable)
    {
        $this->setField('isAvailable', $isAvailable);
    }

    /**
     * @param mixed $oldPrice
     */
    public function setOldPrice($oldPrice)
    {
        $this->setField('oldPrice', $oldPrice);
    }

    /**
     * @param mixed $shelfLife
     */
    public function setShelfLife($shelfLife)
    {
        $this->setField('shelfLife', $shelfLife);
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->setField('url', $url);
    }

    /**
     * @param mixed $pictureUrl
     */
    public function setPictureUrl($pictureUrl)
    {
        $this->setField('pictureUrl', $pictureUrl);
    }
}
