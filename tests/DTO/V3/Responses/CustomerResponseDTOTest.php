<?php

namespace Mindbox\Tests\DTO\V3\Responses;

use Mindbox\DTO\V3\Responses\CustomerResponseDTO;

/**
 * Class CustomerResponseDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class CustomerResponseDTOTest extends CustomerIdentityResponseDTOTest
{
    /**
     * @var CustomerResponseDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = CustomerResponseDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'                    => ['someField' => 'someValue'],
            'processingStatus'       => 'some_processingStatus',
            'sex'                    => 'some_sex',
            'email'                  => 'some_email',
            'isEmailInvalid'         => 'some_isEmailInvalid',
            'isEmailConfirmed'       => 'some_isEmailConfirmed',
            'pendingEmail'           => 'some_pendingEmail',
            'mobilePhone'            => 'some_mobilePhone',
            'isMobilePhoneInvalid'   => 'some_isMobilePhoneInvalid',
            'isMobilePhoneConfirmed' => 'some_isMobilePhoneConfirmed',
            'pendingMobilePhone'     => 'some_pendingMobilePhone',
            'lastName'               => 'some_lastName',
            'firstName'              => 'some_firstName',
            'middleName'             => 'some_middleName',
            'birthDate'              => 'some_birthDate',
            'area'                   => ['someField' => 'someValue'],
            'subscriptions'          => [['someField' => 'someValue']],
            'customFields'           => ['someField' => 'someValue'],
            'changeDateTimeUtc'      => 'some_changeDateTimeUtc',
            'status'                 => 'some_status',
            'ianaTimeZone'           => 'some_ianaTimeZone',
            'timeZoneSource'         => 'some_timeZoneSource',
        ];
        $this->dto = new CustomerResponseDTO($data);
    }

    public function testGetSex()
    {
        $field = $this->dto->getSex();

        $this->assertSame('some_sex', $field);
    }

    public function testGetEmail()
    {
        $field = $this->dto->getEmail();

        $this->assertSame('some_email', $field);
    }

    public function testGetIsEmailInvalid()
    {
        $field = $this->dto->getIsEmailInvalid();

        $this->assertSame('some_isEmailInvalid', $field);
    }

    public function testGetIsEmailConfirmed()
    {
        $field = $this->dto->getIsEmailConfirmed();

        $this->assertSame('some_isEmailConfirmed', $field);
    }

    public function testGetPendingEmail()
    {
        $field = $this->dto->getPendingEmail();

        $this->assertSame('some_pendingEmail', $field);
    }

    public function testGetMobilePhone()
    {
        $field = $this->dto->getMobilePhone();

        $this->assertSame('some_mobilePhone', $field);
    }

    public function testGetIsMobilePhoneInvalid()
    {
        $field = $this->dto->getIsMobilePhoneInvalid();

        $this->assertSame('some_isMobilePhoneInvalid', $field);
    }

    public function testGetIsMobilePhoneConfirmed()
    {
        $field = $this->dto->getIsMobilePhoneConfirmed();

        $this->assertSame('some_isMobilePhoneConfirmed', $field);
    }

    public function testGetPendingMobilePhone()
    {
        $field = $this->dto->getPendingMobilePhone();

        $this->assertSame('some_pendingMobilePhone', $field);
    }

    public function testGetLastName()
    {
        $field = $this->dto->getLastName();

        $this->assertSame('some_lastName', $field);
    }

    public function testGetFirstName()
    {
        $field = $this->dto->getFirstName();

        $this->assertSame('some_firstName', $field);
    }

    public function testGetMiddleName()
    {
        $field = $this->dto->getMiddleName();

        $this->assertSame('some_middleName', $field);
    }

    public function testGetBirthDate()
    {
        $field = $this->dto->getBirthDate();

        $this->assertSame('some_birthDate', $field);
    }

    public function testGetArea()
    {
        $field = $this->dto->getArea();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\AreaResponseDTO::class, $field);
    }

    public function testGetSubscriptions()
    {
        $field = $this->dto->getSubscriptions();

        $this->assertInstanceOf(\Mindbox\DTO\V3\Responses\SubscriptionResponseCollection::class, $field);
    }

    public function testGetCustomFields()
    {
        $field = $this->dto->getCustomFields();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testGetCustomField()
    {
        $field = $this->dto->getCustomField('someField');

        $this->assertSame('someValue', $field);
    }

    public function testGetChangeDateTimeUtc()
    {
        $field = $this->dto->getChangeDateTimeUtc();

        $this->assertSame('some_changeDateTimeUtc', $field);
    }

    public function testGetStatus()
    {
        $field = $this->dto->getStatus();

        $this->assertSame('some_status', $field);
    }

    public function testGetIanaTimeZone()
    {
        $field = $this->dto->getIanaTimeZone();

        $this->assertSame('some_ianaTimeZone', $field);
    }

    public function testGetTimeZoneSource()
    {
        $field = $this->dto->getTimeZoneSource();

        $this->assertSame('some_timeZoneSource', $field);
    }
}
