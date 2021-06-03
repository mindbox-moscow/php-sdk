<?php

namespace Mindbox\Tests;

use Mindbox\MindboxRequest;
use PHPUnit\Framework\TestCase;
use Mindbox\Options;

/**
 * Class MindboxRequestTest
 *
 * @package Mindbox\Tests\Clients
 * @coversDefaultClass \Mindbox\MindboxRequest
 */
class MindboxRequestTest extends TestCase
{
    /**
     * @covers ::getUrl()
     */
    public function testGetUrl()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertSame('url', $request->getUrl());
    }

    /**
     * @covers ::__construct()
     */
    public function testRequestConstructor()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertInstanceOf(MindboxRequest::class, $request);
    }

    /**
     * @covers ::getCleanHeaders()
     * @covers ::cleanHeaders()
     */
    public function testGetCleanHeadersForV2Api()
    {
        $request = new MindboxRequest(
            'apiVer',
            'url',
            'method',
            'body',
            ['header1' => 'headerVal1', 'Authorization' => 'DirectCrm key="{{authKey}}"']
        );

        $this->assertSame(
            ['header1' => 'headerVal1', 'Authorization' => 'DirectCrm key='],
            $request->getCleanHeaders()
        );
    }

    /**
     * @covers ::getCleanHeaders()
     * @covers ::cleanHeaders()
     */
    public function testGetCleanHeadersForV3Api()
    {
        $request = new MindboxRequest(
            'apiVer',
            'url',
            'method',
            'body',
            ['header1' => 'headerVal1', 'Authorization' => 'Mindbox secretKey="{{authKey}}"']
        );

        $this->assertSame(
            ['header1' => 'headerVal1', 'Authorization' => 'Mindbox secretKey='],
            $request->getCleanHeaders()
        );
    }

    /**
     * @covers ::getMethod()
     */
    public function testGetMethod()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertSame('method', $request->getMethod());
    }

    /**
     * @covers ::getCleanBody()
     * @covers ::cleanBody()
     */
    public function testGetCleanBodyFromXml()
    {
        $request = new MindboxRequest(
            'apiVer',
            'url',
            'method',
            '<customer><password>qwerty</password></customer>',
            ['header1' => 'headerVal1']
        );

        $this->assertSame('<customer><password>*****</password></customer>', $request->getCleanBody());
    }

    /**
     * @covers ::getCleanBody()
     * @covers ::cleanBody()
     */
    public function testGetCleanBodyFromJson()
    {
        $request = new MindboxRequest(
            'apiVer',
            'url',
            'method',
            '{"customer":{"password":"qwerty"}}',
            ['header1' => 'headerVal1']
        );

        $this->assertSame('{"customer":{"password":"*****"}}', $request->getCleanBody());
    }

    /**
     * @covers ::getBody()
     */
    public function testGetBody()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertSame('body', $request->getBody());
    }

    /**
     * @covers ::getHeaders()
     */
    public function testGetHeaders()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertSame(['header1' => 'headerVal1'], $request->getHeaders());
    }

    /**
     * @covers ::getApiVersion()
     */
    public function testGetApiVersion()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertSame('apiVer', $request->getApiVersion());
    }

    /**
     * @covers ::__sleep()
     */
    public function testSleep()
    {
        $request = new MindboxRequest('apiVer', 'url', 'method', 'body', ['header1' => 'headerVal1']);

        $this->assertIsArray($request->__sleep());
    }
}
