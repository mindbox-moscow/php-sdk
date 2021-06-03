<?php

namespace Mindbox\Tests\Responses;

use Mindbox\DTO\V3\Responses\CustomerIdentityResponseCollection;
use Mindbox\DTO\V3\Responses\CustomerIdentityResponseDTO;
use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxMergeCustomersResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxMergeCustomersResponseTest
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxMergeCustomersResponseTest extends TestCase
{
    /**
     * @var MindboxMergeCustomersResponse
     */
    protected $response;

    public function setUp(): void
    {
        $this->response = new MindboxMergeCustomersResponse(
            200,
            [],
            [
                'result' => [
                    'customersToMerge' => [
                        [
                            'processingStatus' => 'status',
                        ],
                    ],
                    'resultingCustomer' => [
                        'processingStatus' => 'status',
                    ],
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetCustomersToMerge()
    {
        $this->assertInstanceOf(CustomerIdentityResponseCollection::class, $this->response->getCustomersToMerge());
    }

    public function testGetResultingCustomer()
    {
        $this->assertInstanceOf(CustomerIdentityResponseDTO::class, $this->response->getResultingCustomer());
    }
}
