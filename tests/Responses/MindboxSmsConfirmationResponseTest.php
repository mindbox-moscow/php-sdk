<?php

namespace Mindbox\Tests\Responses;

use Mindbox\DTO\V3\Responses\SmsConfirmationResponseDTO;
use Mindbox\MindboxRequest;
use Mindbox\Responses\MindboxSmsConfirmationResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class MindboxSmsConfirmationResponseTest
 *
 * @package Mindbox\Tests\Responses
 */
class MindboxSmsConfirmationResponseTest extends TestCase
{
    /**
     * @var MindboxSmsConfirmationResponse
     */
    protected $response;

    public function setUp(): void
    {
        $this->response = new MindboxSmsConfirmationResponse(
            200,
            [],
            [
                'result' => [
                    'smsConfirmation' => [
                        [
                            'processingStatus' => 'status',
                        ],
                    ],
                ],
            ],
            '',
            new MindboxRequest('', '', '', '', [])
        );
    }

    public function testGetCustomersToMerge()
    {
        $this->assertInstanceOf(SmsConfirmationResponseDTO::class, $this->response->getSmsConfirmation());
    }
}
