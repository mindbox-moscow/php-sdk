<?php

namespace Mindbox\Tests\Responses;

use Mindbox\DTO\V3\Responses\BalanceResponseCollection;
use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxBonusPointsResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxBonusPointsResponseTest
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxBonusPointsResponseTest extends TestCase
{
    /**
     * @var MindboxBonusPointsResponse
     */
    protected $response;

    /**
     * @var MindboxBonusPointsResponse
     */
    protected $emptyResponse;

    public function setUp(): void
    {
        $this->response = new MindboxBonusPointsResponse(
            200,
            [],
            [
                'result' => [
                    'balances' => [

                    ],
                    'customer' => [
                        'processingStatus' => 'status',
                    ],
                    'customerActionsCount' => 15,
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );

        $this->emptyResponse = new MindboxBonusPointsResponse(
            200,
            [],
            [
                'result' => [],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetBalances()
    {
        $this->assertInstanceOf(BalanceResponseCollection::class, $this->response->getBalances());
    }

    public function testGetCustomerProcessingStatus()
    {
        $this->assertSame('status', $this->response->getCustomerProcessingStatus());
    }

    public function testGetCustomerActionsCount()
    {
        $this->assertSame(15, $this->response->getCustomerActionsCount());
    }

    public function testGetCustomerProcessingStatusWithEmptyResponse()
    {
        $this->assertSame(null, $this->emptyResponse->getCustomerProcessingStatus());
    }
}
