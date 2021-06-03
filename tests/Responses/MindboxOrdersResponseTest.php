<?php

namespace Mindbox\Tests\Responses;

use Mindbox\DTO\V2\Responses\OrderResponseCollection;
use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxOrdersResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxOrdersResponse
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxOrdersResponseTest extends TestCase
{
    /**
     * @var MindboxOrdersResponse
     */
    protected $response;

    public function setUp(): void
    {
        $this->response = new MindboxOrdersResponse(
            200,
            [],
            [
                'result' => [
                    'orders'     => [
                        [
                            'processingStatus' => 'status',
                        ],
                    ],
                    'totalCount' => 1,
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetCustomersToMerge()
    {
        $this->assertInstanceOf(OrderResponseCollection::class, $this->response->getOrders());
    }

    public function testGetTotalCount()
    {
            $this->assertSame(1, $this->response->getTotalCount());
    }
}
