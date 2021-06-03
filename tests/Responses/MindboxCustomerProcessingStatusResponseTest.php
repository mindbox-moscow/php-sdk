<?php

namespace Mindbox\Tests\Responses;

use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxCustomerProcessingStatusResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxCustomerProcessingStatusResponseTest
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxCustomerProcessingStatusResponseTest extends TestCase
{
    /**
     * @var MindboxCustomerProcessingStatusResponse
     */
    protected $response;

    /**
     * @var MindboxCustomerProcessingStatusResponse
     */
    protected $emptyResponse;

    public function setUp(): void
    {
        $this->response = new MindboxCustomerProcessingStatusResponse(
            200,
            [],
            [
                'result' => [
                    'customer' => [
                        'processingStatus' => 'status',
                    ],
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );

        $this->emptyResponse = new MindboxCustomerProcessingStatusResponse(
            200,
            [],
            [
                'result' => [],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetCustomerIdentity()
    {
        $this->assertSame('status', $this->response->getProcessingStatus());
    }

    public function testGetCustomerIdentityWithEmptyResponse()
    {
        $this->assertSame(null, $this->emptyResponse->getProcessingStatus());
    }
}
