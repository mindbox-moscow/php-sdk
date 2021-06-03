<?php

namespace Mindbox\Tests\Clients;

use Mindbox\Clients\AbstractMindboxClient;
use Mindbox\Exceptions\MindboxHttpClientException;
use Mindbox\MindboxResponse;
use Mindbox\Responses\MindboxOrderResponse;
use PHPUnit\Framework\TestCase;
use Mindbox\Options;

/**
 * Class AbstractMindboxClientTest
 *
 * @package Mindbox\Tests\Clients
 */
class AbstractMindboxClientTest extends TestCase
{
    /**
     * @var string
     */
    private $body = '{"this":"is":["json"]}';

    /**
     * @var string
     */
    protected $secret = 'secret';

    /**
     * @var string
     */
    protected $domain = 'ru';

    /**
     * @var string
     */
    private $authHeader = null;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Mindbox\HttpClients\AbstractHttpClient
     */
    protected $httpClientStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Mindbox\Loggers\MindboxFileLogger
     */
    protected $loggerStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|AbstractMindboxClient
     */
    protected $client;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Mindbox\DTO\DTO
     */
    protected $dtoStub;

    public function setUp(): void
    {
        $this->domain         = $this->domain;
        $this->httpClientStub = $this->getHttpClientStub();
        $this->loggerStub     = $this->getLoggerStub();
        $this->client         = $this->getClient($this->secret, $this->httpClientStub, $this->loggerStub, $this->domain);
        $this->dtoStub        = $this->getDTOStub();
    }

    /**
     * @return array
     */
    public function expectedArgsForSendProvider()
    {
        return [
            [
                [
                    'POST',
                    'operation',
                    $this->getDTOStub(),
                ],
                [
                    'apiVer'  => '',
                    'url'     => null,
                    'method'  => 'POST',
                    'body'    => $this->getDTOStub()->toJson(),
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/json',
                        'Authorization' => $this->authHeader,
                        'Mindbox-Integration' => 'PhpSDK',
                        'Mindbox-Integration-Version' => '1.0'
                    ],
                ],
            ],
            [
                [
                    'GET',
                    'operation',
                    $this->getDTOStub(),
                    'url',
                    ['param' => 'pam-pam'],
                ],
                [
                    'apiVer'  => '',
                    'url'     => null,
                    'method'  => 'GET',
                    'body'    => $this->getDTOStub()->toJson(),
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => $this->authHeader,
                        'Mindbox-Integration' => 'PhpSDK',
                        'Mindbox-Integration-Version' => '1.0'

                    ],
                ],
            ],
        ];
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\Mindbox\DTO\DTO
     */
    protected function getDTOStub()
    {
        $dtoStub = $this->getMockBuilder(\Mindbox\DTO\DTO::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dtoStub->expects($this->any())
            ->method('toJson')
            ->willReturn($this->body);

        return $dtoStub;
    }

    /**
     * @return array
     */
    public function expectedExceptionProvider()
    {
        return [
            [
                'body'              => '',
                'code'              => 200,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxClientException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 500,
                'expectedLogMethod' => 'alert',
                'expectedException' => \Mindbox\Exceptions\MindboxUnavailableException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 503,
                'expectedLogMethod' => 'alert',
                'expectedException' => \Mindbox\Exceptions\MindboxUnavailableException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 400,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxBadRequestException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 409,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxConflictException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 404,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxNotFoundException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 403,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxForbiddenException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 401,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxUnauthorizedException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 429,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxTooManyRequestsException::class,
            ],
            [
                'body'              => 'body',
                'code'              => 666,
                'expectedLogMethod' => 'error',
                'expectedException' => \Mindbox\Exceptions\MindboxClientException::class,
            ],
        ];
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getHttpClientStub()
    {
        $httpClientStub = $this->getMockBuilder(\Mindbox\HttpClients\IHttpClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $httpClientStub;
    }

    /**
     * @param int|null    $code
     * @param string|null $body
     *
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getRawResponseStub($code = null, $body = null)
    {
        $rawResponseStub = $this->getMockBuilder(\Mindbox\HttpClients\HttpClientRawResponse::class)
            ->disableOriginalConstructor()
            ->getMock();

        $rawResponseStub->expects($this->any())
            ->method('getStatusCode')
            ->willReturn($code);

        $rawResponseStub->expects($this->any())
            ->method('getBody')
            ->willReturn($body);

        return $rawResponseStub;
    }

    /**
     * @param array $expected
     *
     * @return \Mindbox\MindboxRequest
     */
    protected function getRequestStub($expected)
    {
        $requestStub = new \Mindbox\MindboxRequest(
            $expected['apiVer'],
            $expected['url'],
            $expected['method'],
            $expected['body'],
            $expected['headers']
        );

        return $requestStub;
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getLoggerStub()
    {
        $loggerStub = $this->getMockBuilder(\Psr\Log\LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $loggerStub;
    }

    /**
     * @param mixed $secret
     * @param mixed $httpClient
     * @param mixed $loggerClient
     *
     * @return \PHPUnit\Framework\MockObject\MockObject|AbstractMindboxClient
     */
    protected function getClient($secret, $httpClient, $loggerClient)
    {
        $clientStub = $this->getMockBuilder(AbstractMindboxClient::class)
            ->setMethods([
                'prepareUrl',
                'prepareQueryParams',
                'prepareAuthorizationHeader',
                'prepareBody',
                'prepareResponseBody'
            ])
            ->setConstructorArgs([$secret, $httpClient, $loggerClient, $this->domain])
            ->getMock();

        $clientStub->expects($this->any())
            ->method('prepareQueryParams')
            ->willReturn([]);

        $clientStub->expects($this->any())
            ->method('prepareAuthorizationHeader')
            ->willReturn($this->authHeader);

        $clientStub->expects($this->any())
            ->method('prepareBody')
            ->willReturn($this->body);

        return $clientStub;
    }

    /**
     * @dataProvider expectedArgsForSendProvider
     *
     * @param array $params
     * @param array $expected
     */
    public function testPrepareRequest($params, $expected)
    {
        $this->assertSame(null, $this->client->getRequest());

        $this->client->prepareRequest(...$params);

        $this->assertEquals($this->getRequestStub($expected), $this->client->getRequest());
    }

    /**
     * @dataProvider expectedArgsForSendProvider
     *
     * @param array $params
     * @param array $expected
     */
    public function testSetRequest($params, $expected)
    {
        $this->client->setRequest($this->getRequestStub($expected));

        $this->assertEquals($this->getRequestStub($expected), $this->client->getRequest());
    }

    /**
     * @dataProvider expectedArgsForSendProvider
     *
     * @param array $params
     * @param array $expected
     */
    public function testGetPreparedRequest($params, $expected)
    {
        $this->assertSame(null, $this->client->getRequest());

        $this->client->setRequest($this->getRequestStub($expected));

        $this->assertEquals($this->getRequestStub($expected), $this->client->getRequest());
    }

    /**
     * @dataProvider expectedArgsForSendProvider
     *
     * @param array $params
     * @param array $expected
     *
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSendPreparedRequest($params, $expected)
    {
        $rawResponseStub = $this->getRawResponseStub(200, 'body');

        $this->httpClientStub->expects($this->once())
            ->method('send')
            ->with($this->getRequestStub($expected))
            ->willReturn($rawResponseStub);

        $this->loggerStub->expects($this->once())
            ->method('info');

        $response = $this->client->prepareRequest(...$params)
            ->sendRequest();

        $this->assertInstanceOf(\Mindbox\MindboxResponse::class, $response);
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSendPreparedRequestWillThrowExceptionWhenRequestEmpty()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxClientException::class);

        $this->client->sendRequest();
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSendPreparedRequestWillThrowExceptionWhenHttpClientThrowException()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxClientException::class);

        $this->httpClientStub->expects($this->once())
            ->method('send')
            ->willThrowException(new MindboxHttpClientException());

        $this->client->prepareRequest('POST', 'operation', $this->getDTOStub())
            ->sendRequest();
    }

    /**
     * @dataProvider expectedArgsForSendProvider
     *
     * @param array $params
     * @param array $expected
     *
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testGetLastResponse($params, $expected)
    {
        $rawResponseStub = $this->getRawResponseStub(200, 'body');

        $this->httpClientStub->expects($this->any())
            ->method('send')
            ->with($this->getRequestStub($expected))
            ->willReturn($rawResponseStub);

        $this->assertSame(null, $this->client->getLastResponse());

        $response = $this->client->prepareRequest(...$params)
            ->sendRequest();

        $this->assertSame($response, $this->client->getLastResponse());

        $this->assertInstanceOf(\Mindbox\MindboxResponse::class, $this->client->getLastResponse());
    }

    /**
     * @dataProvider expectedExceptionProvider
     *
     * @param mixed  $body
     * @param mixed  $code
     * @param string $expectedLogMethod
     * @param string $expectedException
     *
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSendRequestWillThrowHttpClientException($body, $code, $expectedLogMethod, $expectedException)
    {
        $rawResponseStub = $this->getRawResponseStub($code, $body);

        $this->httpClientStub->expects($this->any())
            ->method('send')
            ->willReturn($rawResponseStub);

        $this->loggerStub->expects($this->once())
            ->method($expectedLogMethod);

        $this->expectException($expectedException);

        $this->client->prepareRequest('POST', 'operation', $this->getDTOStub())
            ->sendRequest();
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testNotSetResponseType()
    {
        $rawResponseStub = $this->getRawResponseStub(200, 'someBody');

        $this->httpClientStub->expects($this->any())
            ->method('send')
            ->willReturn($rawResponseStub);

        $result = $this->client->prepareRequest('POST', 'operation', $this->getDTOStub())
            ->sendRequest();

        $this->assertInstanceOf(MindboxResponse::class, $result);
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSetResponseType()
    {
        $rawResponseStub = $this->getRawResponseStub(200, 'someBody');

        $this->httpClientStub->expects($this->any())
            ->method('send')
            ->willReturn($rawResponseStub);

        $this->client->setResponseType(MindboxOrderResponse::class);

        $result = $this->client->prepareRequest('POST', 'operation', $this->getDTOStub())
            ->sendRequest();

        $this->assertInstanceOf(MindboxOrderResponse::class, $result);
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSetResponseTypeWithInvalidClassName()
    {
        $rawResponseStub = $this->getRawResponseStub(200, 'someBody');

        $this->httpClientStub->expects($this->any())
            ->method('send')
            ->willReturn($rawResponseStub);

        $this->client->setResponseType('notExistingClassName');

        $result = $this->client->prepareRequest('POST', 'operation', $this->getDTOStub())
            ->sendRequest();

        $this->assertInstanceOf(MindboxResponse::class, $result);
    }

    /**
     * @throws \Mindbox\Exceptions\MindboxBadRequestException
     * @throws \Mindbox\Exceptions\MindboxClientException
     * @throws \Mindbox\Exceptions\MindboxConflictException
     * @throws \Mindbox\Exceptions\MindboxForbiddenException
     * @throws \Mindbox\Exceptions\MindboxNotFoundException
     * @throws \Mindbox\Exceptions\MindboxTooManyRequestsException
     * @throws \Mindbox\Exceptions\MindboxUnauthorizedException
     * @throws \Mindbox\Exceptions\MindboxUnavailableException
     */
    public function testSetResponseTypeWithNotResponseClassName()
    {
        $rawResponseStub = $this->getRawResponseStub(200, 'someBody');

        $this->httpClientStub->expects($this->any())
            ->method('send')
            ->willReturn($rawResponseStub);

        $this->client->setResponseType(AbstractMindboxClient::class);

        $result = $this->client->prepareRequest('POST', 'operation', $this->getDTOStub())
            ->sendRequest();

        $this->assertInstanceOf(MindboxResponse::class, $result);
    }
}
