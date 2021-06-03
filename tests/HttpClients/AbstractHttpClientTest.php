<?php

namespace Mindbox\Tests\HttpClients;

use Mindbox\HttpClients\AbstractHttpClient;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractHttpClientTest
 *
 * @package Mindbox\Tests\HttpClients
 */
class AbstractHttpClientTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|AbstractHttpClient $abstractHttpClientStub
     */
    protected $abstractHttpClientStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Mindbox\MindboxRequest $requestStub
     */
    protected $requestStub;

    /**
     * @throws \ReflectionException
     */
    public function setUp(): void
    {
        $this->abstractHttpClientStub = $this->getMockForAbstractClass(AbstractHttpClient::class);
        $this->requestStub = $this->getMockBuilder(\Mindbox\MindboxRequest::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @return array
     */
    public function httpMethodsDataProvider()
    {
        return [
            ['POST'],
            ['GET'],
        ];
    }

    /**
     * @return array
     */
    public function incorrectHttpMethodsDataProvider()
    {
        return [
            ['PUT'],
            ['FAKE'],
        ];
    }

    /**
     * @dataProvider httpMethodsDataProvider
     *
     * @param string $method
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSend($method)
    {
        $abstractHttpClientStub = $this->abstractHttpClientStub;

        $requestStub = $this->requestStub;

        $requestStub->expects($this->once())
            ->method('getMethod')
            ->willReturn($method);

        $abstractHttpClientStub->expects($this->once())
            ->method('handleRequest')
            ->with($requestStub);

        $abstractHttpClientStub->send($requestStub);
    }

    /**
     * @dataProvider      incorrectHttpMethodsDataProvider
     *
     * @param string $method
     */
    public function testSendWillThrowExceptionOnIncorrectHttpMethod($method)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxHttpClientException::class);

        $abstractHttpClientStub = $this->abstractHttpClientStub;

        $requestStub = $this->requestStub;

        $requestStub->expects($this->once())
            ->method('getMethod')
            ->willReturn($method);

        $abstractHttpClientStub->expects($this->never())
            ->method('handleRequest');

        $abstractHttpClientStub->send($requestStub);
    }
}
