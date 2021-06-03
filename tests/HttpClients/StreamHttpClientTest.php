<?php

namespace Mindbox\Tests\HttpClients;

use Mindbox\HttpClients\MindboxStream;
use Mindbox\HttpClients\StreamHttpClient;
use PHPUnit\Framework\TestCase;

/**
 * Class StreamHttpClientTest
 * @package Mindbox\Tests\HttpClients
 * @coversDefaultClass \Mindbox\HttpClients\StreamHttpClient
 */
class StreamHttpClientTest extends TestCase
{
    /**
     * @var StreamHttpClient
     */
    protected $streamClient;

    /**
     * @var string
     */
    protected $fakeRawResponse = '<?xml version="1.0" encoding="utf-8"?><result><status>ProtocolError</status><errorMessage>/order/customer/ids/mindbox: Не удалось найти потребителя с Id 1029 в базе</errorMessage><errorId>a582cba6-f402-45be-8189-6b06632b4ebf</errorId><httpStatusCode>400</httpStatusCode></result>';

    /**
     * @var array
     */
    protected $fakeRawHeaders = [
        'HTTP/1.1 400 Bad Request',
        'Cache-Control: private',
        'Content-Type: application/xml; charset=utf-8',
        'X-Server-Name: ZURICH',
        'X-Revision: 1264ac2e7b4362e406bcfa368c8a328aea1df042',
        'Date: Thu, 24 Jan 2019 15:04:39 GMT',
        'Connection: close',
        'Content-Length: 310',
    ];

    /**
     * @var array
     */
    protected $fakeRawHeadersAsArray = [
        'Cache-Control'  => 'private',
        'Content-Type'   => 'application/xml; charset=utf-8',
        'X-Server-Name'  => 'ZURICH',
        'X-Revision'     => '1264ac2e7b4362e406bcfa368c8a328aea1df042',
        'Date'           => 'Thu, 24 Jan 2019 15:04:39 GMT',
        'Connection'     => 'close',
        'Content-Length' => '310',
    ];

    /**
     * @var array
     */
    protected $fakeRequestHeaders = [
        'Accept'        => 'application/xml',
        'Content-Type'  => 'application/xml',
        'Authorization' => 'Mindbox secretKey="someSecretKey"',
    ];

    /**
     * @var string
     */
    protected $fakePreparedRequestHeaders = "Accept: application/xml\r\nContent-Type: application/xml\r\nAuthorization: Mindbox secretKey=\"someSecretKey\"";

    /**
     * @var MindboxStream|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $streamStub;

    public function setUp(): void
    {
        $this->streamStub   = $this->getStreamStub();
        $this->streamClient = new StreamHttpClient($this->streamStub);
    }

    /**
     * @return MindboxStream|\PHPUnit\Framework\MockObject\MockObject
     */
    private function getStreamStub()
    {
        $streamStub = $this->getMockBuilder(MindboxStream::class)
            ->getMock();

        return $streamStub;
    }

    /**
     * @param string $url
     * @param string $method
     * @param string $body
     * @param array  $headers
     *
     * @return \Mindbox\MindboxRequest|\PHPUnit\Framework\MockObject\MockObject
     */
    private function getRequestStub($url, $method, $body, $headers)
    {
        $requestStub = $this->getMockBuilder(\Mindbox\MindboxRequest::class)
            ->disableOriginalConstructor()
            ->getMock();

        $requestStub->expects($this->once())
            ->method('getUrl')
            ->willReturn($url);

        $requestStub->expects($this->atLeastOnce())
            ->method('getMethod')
            ->willReturn($method);

        $requestStub->expects($this->once())
            ->method('getBody')
            ->willReturn($body);

        $requestStub->expects($this->once())
            ->method('getHeaders')
            ->willReturn($headers);

        return $requestStub;
    }

    /**
     * @return array
     */
    public function requestDataProvider()
    {
        return [
            [
                'https://api.mindbox.ru/v3/operations/sync?endpointId=DemoTestWebsite&operation=Website.CheckCustomer',
                'POST',
                '<operation><customer><email>email@mindbox.ru</email></customer></operation>',
                $this->fakeRequestHeaders,
            ],
        ];
    }

    /**
     * @return array
     */
    public function timeoutDataProvider()
    {
        return [[15], [10], [400], ['30'], [null]];
    }

    /**
     * @dataProvider timeoutDataProvider
     * @covers ::__construct
     *
     * @param mixed $timeout
     */
    public function testStreamHttpClientConstructor($timeout)
    {
        $httpClient = new StreamHttpClient(new MindboxStream(), $timeout);

        $this->assertInstanceOf(StreamHttpClient::class, $httpClient);
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @param string $url
     * @param string $method
     * @param string $body
     * @param array  $headers
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSend($url, $method, $body, $headers)
    {
        $streamStub = $this->streamStub;

        $streamStub->expects($this->once())
            ->method('contextCreate')
            ->with([
                       'http' => [
                           'method'        => $method,
                           'header'        => $this->fakePreparedRequestHeaders,
                           'content'       => $body,
                           'timeout'       => StreamHttpClient::DEFAULT_CONNECTION_TIMEOUT,
                           'ignore_errors' => true,
                       ],
                   ]);

        $streamStub->expects($this->once())
            ->method('fileGetContents')
            ->with($url)
            ->willReturn($this->fakeRawResponse);

        $streamStub->expects($this->once())
            ->method('getRawHeaders')
            ->willReturn($this->fakeRawHeaders);

        $request = $this->getRequestStub($url, $method, $body, $headers);

        $response = $this->streamClient->handleRequest($request);

        $this->assertInstanceOf(\Mindbox\HttpClients\HttpClientRawResponse::class, $response);
        $this->assertSame(400, $response->getStatusCode());
        $this->assertSame($this->fakeRawResponse, $response->getBody());
        $this->assertSame($this->fakeRawHeadersAsArray, $response->getHeaders());
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @param string $url
     * @param string $method
     * @param string $body
     * @param array  $headers
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSendWillThrowExceptionWhenBodyIsEmpty($url, $method, $body, $headers)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxHttpClientException::class);

        $streamStub = $this->streamStub;

        $streamStub->expects($this->once())
            ->method('fileGetContents')
            ->willReturn('');

        $request = $this->getRequestStub($url, $method, $body, $headers);

        $this->streamClient->handleRequest($request);
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @param string $url
     * @param string $method
     * @param string $body
     * @param array  $headers
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSendWillThrowExceptionWhenHeadersIsEmpty($url, $method, $body, $headers)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxHttpClientException::class);

        $streamStub = $this->streamStub;

        $streamStub->expects($this->once())
            ->method('getRawHeaders')
            ->willReturn([]);

        $request = $this->getRequestStub($url, $method, $body, $headers);

        $this->streamClient->handleRequest($request);
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @param string $url
     * @param string $method
     * @param string $body
     * @param array  $headers
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSendWillThrowExceptionWhenStreamThrowException($url, $method, $body, $headers)
    {
        $this->expectException(\Mindbox\Exceptions\MindboxHttpClientException::class);

        $streamStub = $this->streamStub;

        $streamStub->expects($this->once())
            ->method('fileGetContents')
            ->willThrowException(new \Exception());

        $request = $this->getRequestStub($url, $method, $body, $headers);

        $this->streamClient->handleRequest($request);
    }
}
