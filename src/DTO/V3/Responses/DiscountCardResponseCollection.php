<?php


namespace Mindbox\DTO\V3\Responses;

use Mindbox\DTO\DTOCollection;

/**
 * Class DiscountCardResponseCollection
 *
 * @package Mindbox\DTO\V3\Responses
 */
class DiscountCardResponseCollection extends DTOCollection
{
    /**
     * @var string Название элементов коллекции для корректной генерации xml.
     */
    protected static $collectionItemsName = DiscountCardResponseDTO::class;

    /**
     * @var string Название элемента для корректной генерации xml.
     */
    protected static $xmlName = 'discountCards';
}
