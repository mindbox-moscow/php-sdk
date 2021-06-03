<?php

namespace Mindbox\Tests\HttpClients;

use Mindbox\HttpClients\HttpClientFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class HttpClientFactoryTest
 * @package Mindbox\Tests\HttpClients
 */
class HttpClientFactoryTest extends TestCase
{
    /**
     * @var HttpClientFactory $httpClientsFactory
     */
    protected $httpClientsFactory;

    /**
     * @var HttpClientFactory|\PHPUnit\Framework\MockObject\MockObject $httpClientsFactory
     */
    protected $factoryStub;

    /**
     * @return array
     */
    public function correctTimeoutProvider()
    {
        return [
            [
                15,
            ],
            [
                80,
            ],
            [
                null,
            ],
        ];
    }

    /**
     * @return array
     */
    public function incorrectTimeoutProvider()
    {
        return [
            [
                10,
                'test',
            ],
            [
                'test',
                'stream',
            ],
        ];
    }

    public function setUp(): void
    {
        $this->httpClientsFactory = new HttpClientFactory();

        $this->factoryStub = $this->getMockBuilder(HttpClientFactory::class)
            ->setMethods(['isCurlLoaded'])
            ->getMock();
    }

    /**
     * @dataProvider      incorrectTimeoutProvider
     *
     * @param mixed $timeout
     * @param mixed $handlerName
     */
    public function testCreateHttpClientThrowsException($timeout, $handlerName)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxConfigException::class);

        $this->httpClientsFactory->createHttpClient($timeout, $handlerName);
    }

    /**
     * @dataProvider correctTimeoutProvider
     *
     * @param mixed $timeout
     */
    public function testCreateStreamHttpClient($timeout)
    {
        $client = $this->httpClientsFactory->createHttpClient($timeout, 'stream');

        $this->assertInstanceOf(\Mindbox\HttpClients\StreamHttpClient::class, $client);
    }

    /**
     * @dataProvider correctTimeoutProvider
     *
     * @param mixed $timeout
     */
    public function testCreateCurlHttpClient($timeout)
    {
        $client = $this->httpClientsFactory->createHttpClient($timeout, 'curl');

        $this->assertInstanceOf(\Mindbox\HttpClients\CurlHttpClient::class, $client);
    }

    public function testCreateDefaultHttpClientWhenCurlIsLoaded()
    {
        $this->factoryStub->expects($this->atLeastOnce())
            ->method('isCurlLoaded')
            ->willReturn(true);

        $client = $this->factoryStub->createHttpClient();

        $this->assertInstanceOf(\Mindbox\HttpClients\CurlHttpClient::class, $client);
    }

    public function testCreateDefaultHttpClientWhenCurlIsNotLoaded()
    {
        $this->factoryStub->expects($this->atLeastOnce())
            ->method('isCurlLoaded')
            ->willReturn(false);

        $client = $this->factoryStub->createHttpClient();

        $this->assertInstanceOf(\Mindbox\HttpClients\StreamHttpClient::class, $client);
    }

    public function testCreateCurlHttpClientThrowsExceptionWhenCurlIsNotLoaded()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxConfigException::class);

        $this->factoryStub->expects($this->atLeastOnce())
            ->method('isCurlLoaded')
            ->willReturn(false);

        $client = $this->factoryStub->createHttpClient(null, 'curl');

        $this->assertInstanceOf(\Mindbox\HttpClients\AbstractHttpClient::class, $client);
    }
}
