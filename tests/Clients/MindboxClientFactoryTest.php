<?php

namespace Mindbox\Tests\Clients;

use Mindbox\Clients\MindboxClientFactory;
use Mindbox\HttpClients\IHttpClient;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxClientFactoryTest
 * @package Mindbox\Tests\Clients
 * @coversDefaultClass \Mindbox\Clients\MindboxClientFactory
 */
class MindboxClientFactoryTest extends TestCase
{
    /* @var IHttpClient $httpClientStub */
    protected $httpClientStub;

    /* @var \Psr\Log\LoggerInterface $loggerHandlerStub */
    protected $loggerHandlerStub;

    /* @var MindboxClientFactory $mindboxClientFactory */
    protected $mindboxClientFactory;

    /* @var \Mindbox\XMLHelper\MindboxXMLSerializer $xmlSerializerStub */
    protected $xmlSerializerStub;

    /**
     * @return array
     */
    public function correctConfigProvider()
    {
        return [
            [
                'v2.1',
                '',
                'secret',
                'domain',
                \Mindbox\Clients\MindboxClientV2::class,
            ],
            [
                'v3',
                'endpoint',
                'secret',
                '',
                \Mindbox\Clients\MindboxClientV3::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function incorrectConfigProvider()
    {
        return [
            [
                'v5',
                'endpoint',
                'secret',
                'domain',
            ],
            [
                123123,
                'endpoint',
                'secret',
                'domain',
            ],
            [
                3,
                'endpoint',
                'secret',
                'domain',
            ],
            [
                'v2.1',
                'endpoint',
                'secret',
                '',
            ],
            [
                'v3',
                '',
                'secret',
                'domain',
            ],
            [
                'v3',
                'endpoint',
                '',
                'domain',
            ],
        ];
    }

    public function setUp(): void
    {
        $this->httpClientStub = $this->createMock(IHttpClient::class);

        $this->loggerHandlerStub = $this->createMock(\Psr\Log\LoggerInterface::class);

        $this->xmlSerializerStub = $this->createMock(\Mindbox\XMLHelper\MindboxXMLSerializer::class);

        $this->mindboxClientFactory = new MindboxClientFactory();
    }

    /**
     * @dataProvider incorrectConfigProvider
     * @covers ::createMindboxClient()
     *
     * @param string $api
     * @param string $endpoint
     * @param string $secret
     * @param string $domain
     */
    public function testCreateMindboxClientThrowsException($api, $endpoint, $secret, $domain)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxConfigException::class);

        $this->mindboxClientFactory->createMindboxClient(
            $api,
            $endpoint,
            $secret,
            $domain,
            $this->httpClientStub,
            $this->loggerHandlerStub
        );
    }

    /**
     * @dataProvider correctConfigProvider
     * @covers ::createMindboxClient()
     *
     * @param string $api
     * @param string $endpoint
     * @param string $secret
     * @param string $domain
     * @param string $expectedClient
     */
    public function testCreateMindboxClient($api, $endpoint, $secret, $domain, $expectedClient)
    {
        $client = $this->mindboxClientFactory->createMindboxClient(
            $api,
            $endpoint,
            $secret,
            $domain,
            $this->httpClientStub,
            $this->loggerHandlerStub
        );

        $this->assertInstanceOf($expectedClient, $client);
    }
}
