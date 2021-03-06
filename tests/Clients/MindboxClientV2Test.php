<?php

namespace Mindbox\Tests\Clients;

use Mindbox\Clients\MindboxClientV2;

/**
 * Class MindboxClientV2Test
 * @package Mindbox\Tests\Clients
 */
class MindboxClientV2Test extends AbstractMindboxClientTest
{
    /**
     * @return array
     */
    public function expectedArgsForSendProvider()
    {
        return [
            [
                [
                    'POST',
                    'someOperation',
                    $this->getDTOStub(),
                ],
                [
                    'apiVer'  => 'v2.1',
                    'url'     => 'https://domain.directcrm.ru/v2.1/orders/?operation=someOperation',
                    'method'  => 'POST',
                    'body'    => $this->getDTOStub()->toXml(),
                    'headers' => [
                        'Accept'        => 'application/xml',
                        'Content-Type'  => 'application/xml',
                        'Authorization' => 'DirectCrm key="' . $this->secret . '"',
                        'Mindbox-Integration' => 'PhpSDK',
                        'Mindbox-Integration-Version' => '1.0'
                    ],
                ],
            ],
            [
                [
                    'GET',
                    'Website.otherOperation',
                    $this->getDTOStub(),
                    'url',
                    ['param' => 'pam-pam'],
                ],
                [
                    'apiVer'  => 'v2.1',
                    'url'     => 'https://domain.directcrm.ru/v2.1/orders/url?param=pam-pam&operation=Website.otherOperation',
                    'method'  => 'GET',
                    'body'    => $this->getDTOStub()->toXml(),
                    'headers' => [
                        'Accept'        => 'application/xml',
                        'Content-Type'  => 'application/xml',
                        'Authorization' => 'DirectCrm key="' . $this->secret . '"',
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
            ->method('toXML')
            ->willReturn('<?xml version="1.0" encoding="utf-8"?><dto><body>test</body></dto>');

        return $dtoStub;
    }

    /**
     * @param mixed $secret
     * @param mixed $httpClient
     * @param mixed $loggerClient
     *
     * @return MindboxClientV2
     */
    protected function getClient($secret, $httpClient, $loggerClient)
    {
        $serializerStub = $this->getXmlSerializerStub();

        $serializerStub->expects($this->any())
            ->method('fromXMLToArray')
            ->willReturn([]);

        $client = new MindboxClientV2('domain.directcrm.ru', $secret, $httpClient, $loggerClient, $serializerStub);

        return $client;
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\Mindbox\XMLHelper\MindboxXMLSerializer
     */
    protected function getXmlSerializerStub()
    {
        $serializerStub = $this->getMockBuilder(\Mindbox\XMLHelper\MindboxXMLSerializer::class)
            ->getMock();

        return $serializerStub;
    }
}
