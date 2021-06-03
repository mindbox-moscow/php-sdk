<?php

namespace Mindbox\Tests\Responses;

use Mindbox\DTO\V3\Responses\CustomerIdentityResponseDTO;
use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxCustomerIdentityResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxCustomerIdentityResponseTest
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxCustomerIdentityResponseTest extends TestCase
{
    /**
     * @var MindboxCustomerIdentityResponse
     */
    protected $response;

    public function setUp(): void
    {
        $this->response = new MindboxCustomerIdentityResponse(
            200,
            [],
            [
                'result' => [
                    'customer' => [
                        'ids' => [],
                    ],
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetCustomerIdentity()
    {
        $this->assertInstanceOf(CustomerIdentityResponseDTO::class, $this->response->getCustomerIdentity());
    }
}
