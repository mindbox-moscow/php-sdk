<?php

namespace Mindbox\Tests\Helpers;

use Mindbox\DTO\V3\OperationDTO;
use Mindbox\Helpers\CustomerHelper;
use Mindbox\Responses\MindboxBalanceResponse;
use Mindbox\Responses\MindboxBonusPointsResponse;
use Mindbox\Responses\MindboxCustomerIdentityResponse;
use Mindbox\Responses\MindboxCustomerProcessingStatusResponse;
use Mindbox\Responses\MindboxCustomerResponse;
use Mindbox\Responses\MindboxMergeCustomersResponse;
use Mindbox\Responses\MindboxSmsConfirmationResponse;

/**
 * Class CustomerHelperTest
 *
 * @package Mindbox\Tests\Helpers
 */
class CustomerHelperTest extends AbstractMindboxHelperTest
{
    /**
     * @var CustomerHelper $orderHelper
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

        $this->helper = new CustomerHelper($this->mindboxClientStub);
    }

    public function testGetBalance()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxBalanceResponse::class);

        $this->helper->getBalance($dto, $operationName, $addDeviceUUID);
    }

    public function testMerge()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\MergeCustomersRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $dto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxMergeCustomersResponse::class);

        $this->helper->merge($dto, $operationName, $addDeviceUUID);
    }

    public function testGetBonusPointsHistory()
    {
        $customerDto   = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $pageDto       = new \Mindbox\DTO\V3\Requests\PageRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($customerDto);
        $operationDto->setPage($pageDto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxBonusPointsResponse::class);

        $this->helper->getBonusPointsHistory(
            $customerDto,
            $pageDto,
            $operationName,
            $addDeviceUUID
        );
    }

    public function testAuthorize()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], false, $addDeviceUUID);

        $this->helper->authorize($dto, $operationName, $addDeviceUUID);
    }

    public function testCheckActive()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerResponse::class);

        $this->helper->checkActive($dto, $operationName, $addDeviceUUID);
    }

    public function testCheckByMail()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerResponse::class);

        $this->helper->checkByMail($dto, $operationName, $addDeviceUUID);
    }

    public function testFill()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerIdentityResponse::class);

        $this->helper->fill($dto, $operationName, $addDeviceUUID);
    }

    public function testSubscribe()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerResponse::class);

        $this->helper->subscribeCustomer($dto, $operationName, $addDeviceUUID);
    }

    public function testEdit()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerIdentityResponse::class);

        $this->helper->edit($dto, $operationName, $addDeviceUUID);
    }

    public function testRegister()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerIdentityResponse::class);

        $this->helper->register($dto, $operationName, $addDeviceUUID);
    }

    public function testResendConfirmationCode()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerProcessingStatusResponse::class);

        $this->helper->resendConfirmationCode($dto, $operationName, $addDeviceUUID);
    }

    public function testCheckByPhone()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerResponse::class);

        $this->helper->checkByPhone($dto, $operationName, $addDeviceUUID);
    }

    public function testSendAuthorizationCode()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerProcessingStatusResponse::class);

        $this->helper->sendAuthorizationCode($dto, $operationName, $addDeviceUUID);
    }

    public function testGetDataByDiscountCard()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerResponse::class);

        $this->helper->getDataByDiscountCard($dto, $operationName, $addDeviceUUID);
    }

    public function testAutoConfirmMobile()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], false, $addDeviceUUID);

        $this->helper->autoConfirmMobile($dto, $operationName, $addDeviceUUID);
    }

    public function testConfirmMobile()
    {
        $dto             = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $smsConfirmation = new \Mindbox\DTO\V3\Requests\SmsConfirmationRequestDTO();
        $operationName   = 'Website.OperationName';
        $addDeviceUUID   = false;

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $operationDto->setSmsConfirmation($smsConfirmation);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxSmsConfirmationResponse::class);

        $this->helper->confirmMobile($dto, $smsConfirmation, $operationName, $addDeviceUUID);
    }

    public function testCheckAuthorizationCode()
    {
        $dto           = new \Mindbox\DTO\V3\Requests\CustomerRequestDTO();
        $operationName = 'Website.OperationName';
        $addDeviceUUID = false;
        $authCode      = 'authCode';

        $operationDto = new OperationDTO();
        $operationDto->setCustomer($dto);
        $operationDto->setAuthentificationCode($authCode);
        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $operationDto, '', [], true, $addDeviceUUID);

        $this->mindboxClientStub->expects($this->once())
            ->method('setResponseType')
            ->with(MindboxCustomerIdentityResponse::class);

        $this->helper->checkAuthorizationCode($dto, $authCode, $operationName, $addDeviceUUID);
    }
}
