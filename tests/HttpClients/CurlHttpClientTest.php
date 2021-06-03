<?php

namespace Mindbox\Tests\HttpClients;

use Mindbox\HttpClients\CurlHttpClient;
use Mindbox\HttpClients\MindboxCurl;
use PHPUnit\Framework\TestCase;

/**
 * Class CurlHttpClientTest
 * @package  Mindbox\Tests\HttpClients
 * @requires extension curl
 * @coversDefaultClass \Mindbox\HttpClients\CurlHttpClient
 */
class CurlHttpClientTest extends TestCase
{
    /**
     * @var CurlHttpClient
     */
    protected $curlClient;

    /**
     * @var MindboxCurl|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $curlStub;

    public function setUp(): void
    {
        $this->curlStub   = $this->getCurlStub();
        $this->curlClient = new CurlHttpClient($this->curlStub);
    }

    /**
     * @return MindboxCurl|\PHPUnit\Framework\MockObject\MockObject
     */
    private function getCurlStub()
    {
        $curlStub = $this->getMockBuilder(MindboxCurl::class)
            ->getMock();

        return $curlStub;
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
                'url'              => 'https://api.mindbox.ru/v3/operations/sync?endpointId=endpoint',
                'method'           => 'POST',
                'body'             => '<operation><customer><email>email@mindbox.ru</email></customer></operation>',
                'headers'          => [
                    'Accept'        => 'application/xml',
                    'Content-Type'  => 'application/xml',
                    'Authorization' => 'Mindbox secretKey="someSecretKey"',
                ],
                'setOptArray'      => [
                    CURLOPT_CUSTOMREQUEST  => 'POST',
                    CURLOPT_HTTPHEADER     => [
                        'Accept: application/xml',
                        'Content-Type: application/xml',
                        'Authorization: Mindbox secretKey="someSecretKey"',
                    ],
                    CURLOPT_URL            => 'https://api.mindbox.ru/v3/operations/sync?endpointId=endpoint',
                    CURLOPT_CONNECTTIMEOUT => 10,
                    CURLOPT_TIMEOUT        => CurlHttpClient::DEFAULT_CONNECTION_TIMEOUT,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER         => true,
                    CURLOPT_POSTFIELDS     => '<operation><customer><email>email@mindbox.ru</email></customer></operation>',
                ],
                'responseHeaders'  => 'HTTP/1.1 200 OK
Cache-Control: private
Content-Type: application/json; charset=utf-8
X-Request-ID: 8a2bc821-4739-4b5e-a710-cd6b971c541b
X-NewRelic-App-Data: PxQGU1BVDgMTUVRRAgAPX1ETGhE1AwE2QgNWEVlbQFtcCxYsZyIcNFdlUhMQCltWQycODENDWAoIVEQcJx4GAUUWXS1IXUZTRwxWDxNNA0xUGgdPUFsKAgddVk4GAgdKRglyB1FRUiFyUnpRDwgNcQpHFQdQDUAHOQ==
X-Server-Name: DUBLIN
X-Revision: 1264ac2e7b4362e406bcfa368c8a328aea1df042
X-AspNet-Version: 4.0.30319
X-Powered-By: ASP.NET
X-Server-Name: DUBLIN
X-Revision: e65e82e599c17673bb6726be3fb7b5ae0336cdbf
Date: Thu, 24 Jan 2019 14:12:33 GMT
Content-Length: 227',
                'responseBody'     => '{"status":"Success","customer":{"processingStatus":"Created","subscriptions":[{"brand":"Demo-new","pointOfContact":"Email","topic":"news","isSubscribed":true},{"brand":"Demo-new","pointOfContact":"Email","isSubscribed":true}]}}',
                'formattedCode'    => 200,
                'formattedHeaders' => [
                    'Cache-Control'       => 'private',
                    'Content-Type'        => 'application/json; charset=utf-8',
                    'X-Request-ID'        => '8a2bc821-4739-4b5e-a710-cd6b971c541b',
                    'X-NewRelic-App-Data' => 'PxQGU1BVDgMTUVRRAgAPX1ETGhE1AwE2QgNWEVlbQFtcCxYsZyIcNFdlUhMQCltWQycODENDWAoIVEQcJx4GAUUWXS1IXUZTRwxWDxNNA0xUGgdPUFsKAgddVk4GAgdKRglyB1FRUiFyUnpRDwgNcQpHFQdQDUAHOQ==',
                    'X-Server-Name'       => 'DUBLIN',
                    'X-Revision'          => 'e65e82e599c17673bb6726be3fb7b5ae0336cdbf',
                    'X-AspNet-Version'    => '4.0.30319',
                    'X-Powered-By'        => 'ASP.NET',
                    'Date'                => 'Thu, 24 Jan 2019 14:12:33 GMT',
                    'Content-Length'      => '227',
                ],
            ],
            [
                'url'              => 'https://api.mindbox.ru/v3/operations/sync?endpointId=endpoint',
                'method'           => 'GET',
                'body'             => '',
                'headers'          => [
                    'Accept'        => 'application/xml',
                    'Content-Type'  => 'application/xml',
                    'Authorization' => 'Mindbox secretKey="someSecretKey"',
                ],
                'setOptArray'      => [
                    CURLOPT_CUSTOMREQUEST  => 'GET',
                    CURLOPT_HTTPHEADER     => [
                        'Accept: application/xml',
                        'Content-Type: application/xml',
                        'Authorization: Mindbox secretKey="someSecretKey"',
                    ],
                    CURLOPT_URL            => 'https://api.mindbox.ru/v3/operations/sync?endpointId=endpoint',
                    CURLOPT_CONNECTTIMEOUT => 10,
                    CURLOPT_TIMEOUT        => CurlHttpClient::DEFAULT_CONNECTION_TIMEOUT,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER         => true,
                ],
                'responseHeaders'  => 'HTTP/1.1 300 OK
Cache-Control: private
Content-Type: application/json; charset=utf-8
X-Request-ID: 8a2bc821-4739-4b5e-a710-cd6b971c541b
X-NewRelic-App-Data: PxQGU1BVDgMTUVRRAgAPX1ETGhE1AwE2QgNWEVlbQFtcCxYsZyIcNFdlUhMQCltWQycODENDWAoIVEQcJx4GAUUWXS1IXUZTRwxWDxNNA0xUGgdPUFsKAgddVk4GAgdKRglyB1FRUiFyUnpRDwgNcQpHFQdQDUAHOQ==
X-Server-Name: DUBLIN
X-Revision: 1264ac2e7b4362e406bcfa368c8a328aea1df042
X-AspNet-Version: 4.0.30319
X-Powered-By: ASP.NET
X-Server-Name: DUBLIN
X-Revision: e65e82e599c17673bb6726be3fb7b5ae0336cdbf
Date: Thu, 24 Jan 2019 14:12:33 GMT
Content-Length: 227',
                'responseBody'     => '{"status":"Success","customer":{"processingStatus":"Created","subscriptions":[{"brand":"Demo-new","pointOfContact":"Email","topic":"news","isSubscribed":true},{"brand":"Demo-new","pointOfContact":"Email","isSubscribed":true}]}}',
                'formattedCode'    => 300,
                'formattedHeaders' => [
                    'Cache-Control'       => 'private',
                    'Content-Type'        => 'application/json; charset=utf-8',
                    'X-Request-ID'        => '8a2bc821-4739-4b5e-a710-cd6b971c541b',
                    'X-NewRelic-App-Data' => 'PxQGU1BVDgMTUVRRAgAPX1ETGhE1AwE2QgNWEVlbQFtcCxYsZyIcNFdlUhMQCltWQycODENDWAoIVEQcJx4GAUUWXS1IXUZTRwxWDxNNA0xUGgdPUFsKAgddVk4GAgdKRglyB1FRUiFyUnpRDwgNcQpHFQdQDUAHOQ==',
                    'X-Server-Name'       => 'DUBLIN',
                    'X-Revision'          => 'e65e82e599c17673bb6726be3fb7b5ae0336cdbf',
                    'X-AspNet-Version'    => '4.0.30319',
                    'X-Powered-By'        => 'ASP.NET',
                    'Date'                => 'Thu, 24 Jan 2019 14:12:33 GMT',
                    'Content-Length'      => '227',
                ],
            ],
            [
                'url'              => 'https://api.mindbox.ru/v3/operations/sync?endpointId=endpoint',
                'method'           => 'GET',
                'body'             => '',
                'headers'          => [
                    'Accept'        => 'application/xml',
                    'Content-Type'  => 'application/xml',
                    'Authorization' => 'Mindbox secretKey="someSecretKey"',
                ],
                'setOptArray'      => [
                    CURLOPT_CUSTOMREQUEST  => 'GET',
                    CURLOPT_HTTPHEADER     => [
                        'Accept: application/xml',
                        'Content-Type: application/xml',
                        'Authorization: Mindbox secretKey="someSecretKey"',
                    ],
                    CURLOPT_URL            => 'https://api.mindbox.ru/v3/operations/sync?endpointId=endpoint',
                    CURLOPT_CONNECTTIMEOUT => 10,
                    CURLOPT_TIMEOUT        => CurlHttpClient::DEFAULT_CONNECTION_TIMEOUT,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER         => true,
                ],
                'responseHeaders'  => '',
                'responseBody'     => '',
                'formattedCode'    => 0,
                'formattedHeaders' => [],
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
     *
     * @param mixed $timeout
     */
    public function testCurlHttpClientConstructor($timeout)
    {
        $httpClient = new CurlHttpClient($this->getCurlStub(), $timeout);

        $this->assertInstanceOf(CurlHttpClient::class, $httpClient);
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @param string $url
     * @param string $method
     * @param string $body
     * @param array  $headers
     * @param array  $curlOptArray
     * @param string $responseHeaders
     * @param string $responseBody
     * @param int    $formattedCode
     * @param array  $formattedHeaders
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSend(
        $url,
        $method,
        $body,
        $headers,
        $curlOptArray,
        $responseHeaders,
        $responseBody,
        $formattedCode,
        $formattedHeaders
    ) {
        $curlStub = $this->curlStub;

        $curlStub->expects($this->once())
            ->method('init');

        $curlStub->expects($this->once())
            ->method('setOptArray')
            ->with($curlOptArray);

        $curlStub->expects($this->once())
            ->method('exec')
            ->willReturn(!empty($responseHeaders) ? $responseHeaders . "\r\n\r\n" . $responseBody : '');

        $curlStub->expects($this->once())
            ->method('errno')
            ->willReturn(0);

        $curlStub->expects($this->never())
            ->method('error');

        $curlStub->expects($this->once())
            ->method('close');

        $request = $this->getRequestStub($url, $method, $body, $headers);

        $response = $this->curlClient->handleRequest($request);

        $this->assertInstanceOf(\Mindbox\HttpClients\HttpClientRawResponse::class, $response);
        $this->assertSame($formattedCode, $response->getStatusCode());
        $this->assertSame($responseBody, $response->getBody());
        $this->assertSame($formattedHeaders, $response->getHeaders());
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @throws \Mindbox\Exceptions\MindboxHttpClientException
     */
    public function testSendWillThrowExceptionOnCurlError()
    {
        $this->expectException(\Mindbox\Exceptions\MindboxHttpClientException::class);

        $curlStub = $this->curlStub;

        $curlStub->expects($this->once())
            ->method('errno')
            ->willReturn(1);

        $curlStub->expects($this->once())
            ->method('error')
            ->willReturn('This is Error');

        $request = $this->getRequestStub('url', 'method', 'body', []);

        $this->curlClient->handleRequest($request);
    }
}
