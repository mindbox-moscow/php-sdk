<?php

namespace Mindbox\Tests\Responses;

use Mindbox\DTO\V3\Responses\CustomerResponseDTO;
use Mindbox\DTO\V3\Responses\DiscountCardResponseCollection;
use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxCustomerResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxCustomerResponseTest
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxCustomerResponseTest extends TestCase
{
    /**
     * @var MindboxCustomerResponse
     */
    protected $response;

    public function setUp(): void
    {
        $this->response = new MindboxCustomerResponse(
            200,
            [],
            [
                'result' => [
                    'customer' => [
                        'processingStatus' => 'status',
                    ],
                    'discountCards' => [],
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetCustomer()
    {
        $this->assertInstanceOf(CustomerResponseDTO::class, $this->response->getCustomer());
    }

    public function testGetDiscountCards()
    {
        $this->assertInstanceOf(DiscountCardResponseCollection::class, $this->response->getDiscountCards());
    }
}
