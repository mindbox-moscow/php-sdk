<?php

namespace Mindbox\Tests\Helpers;

use Mindbox\DTO\V3\OperationDTO;
use Mindbox\Helpers\ProductListHelper;

/**
 * Class ProductListHelperTest
 *
 * @package Mindbox\Tests\Helpers
 */
class ProductListHelperTest extends AbstractMindboxHelperTest
{
    /**
     * @var ProductListHelper $orderHelper
     */
    protected $helper;

    /**
     * @var \Mindbox\Clients\AbstractMindboxClient|\PHPUnit\Framework\MockObject\MockObject $mindboxClientStub
     */
    protected $mindboxClientStub;

    /**
     * @var \Mindbox\MindboxResponse|\PHPUnit\Framework\MockObject\MockObject $mindboxResponseStub
     */
    protected $mindboxResponseStub;

    public function setUp(): void
    {
        $this->mindboxResponseStub = $this->createMock(\Mindbox\MindboxResponse::class);

        $this->mindboxClientStub = $this->getMindboxClientStub();

        $this->helper = new ProductListHelper($this->mindboxClientStub);
    }

    public function testRemoveFromCart()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\RemoveProductFromListRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operation = new OperationDTO();
        $operation->setRemoveProductFromList($dto);

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operation, '', [], false, $addDeviceUUID);

        $this->helper->removeFromCart($dto, $operationName, $addDeviceUUID);
    }

    public function testAddToCart()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\AddProductToListRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operation = new OperationDTO();
        $operation->setAddProductToList($dto);

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operation, '', [], false, $addDeviceUUID);

        $this->helper->addToCart($dto, $operationName, $addDeviceUUID);
    }

    public function testSetProductCount()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\SetProductCountInListRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operation = new OperationDTO();
        $operation->setSetProductCountInList($dto);

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operation, '', [], false, $addDeviceUUID);

        $this->helper->setProductCount($dto, $operationName, $addDeviceUUID);
    }

    public function testSetProductList()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\ProductListItemRequestCollection();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operation = new OperationDTO();
        $operation->setProductList($dto);

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operation, '', [], false, $addDeviceUUID);

        $this->helper->setProductList($dto, $operationName, null, $addDeviceUUID);
    }

    public function testSetProductListWithCustomer()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\ProductListItemRequestCollection();
        $customer      = new \Mindbox\DTO\V3\Requests\CustomerIdentityRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operation = new OperationDTO();
        $operation->setProductList($dto);
        $operation->setCustomer($customer);

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operation, '', [], false, $addDeviceUUID);

        $this->helper->setProductList($dto, $operationName, $customer, $addDeviceUUID);
    }
}
