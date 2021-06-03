<?php

namespace Mindbox\Tests\DTO\V2\Requests;

use Mindbox\DTO\V2\Requests\CustomerRequestDTO;
use Mindbox\DTO\V2\Requests\SubscriptionRequestCollection;
use Mindbox\DTO\V2\Requests\SubscriptionRequestDTO;
use Mindbox\Tests\DTO\DTOTest;

/**
 * Class CustomerRequestV2DTOTest
 *
 * @package Mindbox\Tests\DTO\V2\Requests
 */
class CustomerRequestDTOTest extends DTOTest
{
    /**
     * @var CustomerRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = CustomerRequestDTO::class;

    public function setUp(): void
    {
        $data      = [
            'ids'                  => ['someField' => 'someValue'],
            'email'                => 'some_email',
            'mobilePhone'          => 'some_mobilePhone',
            'lastName'             => 'some_lastName',
            'firstName'            => 'some_firstName',
            'middleName'           => 'some_middleName',
            'fullName'             => 'some_fullName',
            'birthDate'            => 'some_birthDate',
            'password'             => 'some_password',
            'area'                 => ['someField' => 'someValue'],
            'subscriptions'        => [['someField' => 'someValue'], ['someField2' => 'someValue2']],
            'customFields'         => ['someField' => 'someValue'],
            'authenticationTicket' => 'some_authenticationTicket',
            'isAuthorized'         => 'some_isAuthorized',
            'discountCard'         => ['someField' => 'someValue'],
        ];
        $this->dto = new CustomerRequestDTO($data);
    }

    public function testGetEmail()
    {
        $field = $this->dto->getEmail();

        $this->assertSame('some_email', $field);
    }

    public function testSetEmail()
    {
        $this->dto->setEmail('new_email');
        $field = $this->dto->getEmail();

        $this->assertSame('new_email', $field);
    }

    public function testGetMobilePhone()
    {
        $field = $this->dto->getMobilePhone();

        $this->assertSame('some_mobilePhone', $field);
    }

    public function testSetMobilePhone()
    {
        $this->dto->setMobilePhone('new_mobilePhone');
        $field = $this->dto->getMobilePhone();

        $this->assertSame('new_mobilePhone', $field);
    }

    public function testGetLastName()
    {
        $field = $this->dto->getLastName();

        $this->assertSame('some_lastName', $field);
    }

    public function testSetLastName()
    {
        $this->dto->setLastName('new_lastName');
        $field = $this->dto->getLastName();

        $this->assertSame('new_lastName', $field);
    }

    public function testGetFirstName()
    {
        $field = $this->dto->getFirstName();

        $this->assertSame('some_firstName', $field);
    }

    public function testSetFirstName()
    {
        $this->dto->setFirstName('new_firstName');
        $field = $this->dto->getFirstName();

        $this->assertSame('new_firstName', $field);
    }

    public function testGetMiddleName()
    {
        $field = $this->dto->getMiddleName();

        $this->assertSame('some_middleName', $field);
    }

    public function testSetMiddleName()
    {
        $this->dto->setMiddleName('new_middleName');
        $field = $this->dto->getMiddleName();

        $this->assertSame('new_middleName', $field);
    }

    public function testGetFullName()
    {
        $field = $this->dto->getFullName();

        $this->assertSame('some_fullName', $field);
    }

    public function testSetFullName()
    {
        $this->dto->setFullName('new_fullName');
        $field = $this->dto->getFullName();

        $this->assertSame('new_fullName', $field);
    }

    public function testGetBirthDate()
    {
        $field = $this->dto->getBirthDate();

        $this->assertSame('some_birthDate', $field);
    }

    public function testSetBirthDate()
    {
        $this->dto->setBirthDate('new_birthDate');
        $field = $this->dto->getBirthDate();

        $this->assertSame('new_birthDate', $field);
    }

    public function testGetPassword()
    {
        $field = $this->dto->getPassword();

        $this->assertSame('some_password', $field);
    }

    public function testSetPassword()
    {
        $this->dto->setPassword('new_password');
        $field = $this->dto->getPassword();

        $this->assertSame('new_password', $field);
    }

    public function testGetArea()
    {
        $field = $this->dto->getArea();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\AreaRequestDTO::class, $field);
    }

    public function testSetArea()
    {
        $this->dto->setArea(['name' => 'someName']);
        $field = $this->dto->getArea();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\AreaRequestDTO::class, $field);
        $this->assertSame('someName', $field->getName());
    }

    public function testGetSubscriptions()
    {
        $field = $this->dto->getSubscriptions();

        $this->assertInstanceOf(SubscriptionRequestCollection::class, $field);
    }

    public function testSetSubscriptions()
    {
        $this->dto->setSubscriptions(['subscription' => ['topic' => 'some_topic']]);
        $field = $this->dto->getSubscriptions();

        $this->assertInstanceOf(SubscriptionRequestCollection::class, $field);

        $this->dto->setSubscriptions([new SubscriptionRequestDTO()]);
        $field = $this->dto->getSubscriptions();

        $this->assertInstanceOf(SubscriptionRequestCollection::class, $field);
    }

    public function testGetCustomFields()
    {
        $field = $this->dto->getCustomFields();

        $this->assertSame(['someField' => 'someValue'], $field);
    }

    public function testSetCustomFields()
    {
        $setField = ['customField' => ['topic' => 'some_topic']];
        $this->dto->setCustomFields($setField);
        $field = $this->dto->getCustomFields();

        $this->assertSame($setField, $field);
    }

    public function testGetCustomField()
    {
        $field = $this->dto->getCustomField('someField');

        $this->assertSame('someValue', $field);
    }

    public function testSetCustomField()
    {
        $this->dto->setCustomField('customField', ['some_topic']);
        $field = $this->dto->getCustomField('customField');

        $this->assertSame(['some_topic'], $field);
    }

    public function testGetAuthenticationTicket()
    {
        $field = $this->dto->getAuthenticationTicket();

        $this->assertSame('some_authenticationTicket', $field);
    }

    public function testSetAuthenticationTicket()
    {
        $this->dto->setAuthenticationTicket('new_authenticationTicket');
        $field = $this->dto->getAuthenticationTicket();

        $this->assertSame('new_authenticationTicket', $field);
    }

    public function testGetDiscountCard()
    {
        $field = $this->dto->getDiscountCard();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\DiscountCardIdentityRequestDTO::class, $field);
        $this->assertSame(['someField' => 'someValue'], $field->getFieldsAsArray());
    }

    public function testSetDiscountCard()
    {
        $this->dto->setDiscountCard(['ids' => ['number' => 'some_number']]);
        $field = $this->dto->getDiscountCard();

        $this->assertInstanceOf(\Mindbox\DTO\V2\Requests\DiscountCardIdentityRequestDTO::class, $field);
        $this->assertSame('some_number', $field->getId('number'));
    }

    public function testGetFieldsAsArrayByCollection()
    {
        $dto = new CustomerRequestDTO();
        $dto->setPassword('password1');
        $dto->setMiddleName('middleName1');

        $subscriptions = [];

        $subscription = new SubscriptionRequestDTO();
        $subscription->setPointOfContact('pointOfContact1');

        $subscriptions[] = $subscription;

        $subscription = new SubscriptionRequestDTO();
        $subscription->setPointOfContact('pointOfContact2');

        $subscriptions[] = $subscription;

        $subscriptionsCollection = new SubscriptionRequestCollection($subscriptions);

        $dto->setSubscriptions($subscriptionsCollection);

        $array = [
            'password'      => 'password1',
            'middleName'    => 'middleName1',
            'subscriptions' => [
                [
                    'pointOfContact' => 'pointOfContact1',
                ],
                [
                    'pointOfContact' => 'pointOfContact2',
                ],
            ],
        ];

        $this->assertSame($array, $dto->getFieldsAsArray());

        $array['subscriptions'][CustomerRequestDTO::XML_ITEM_NAME_INDEX] = 'subscription';

        $this->assertSame($array, $dto->getFieldsAsArray(false));
    }

    public function testGetFieldsAsArrayBySetField()
    {
        $dto = new CustomerRequestDTO();
        $dto->setField('password', 'password1');
        $dto->setField('middleName', 'middleName1');

        $subscriptions = [
            [
                'pointOfContact' => 'pointOfContact1',
            ],
            [
                'pointOfContact' => 'pointOfContact2',
            ],
        ];
        $dto->setField('subscriptions', $subscriptions);

        $array = [
            'password'      => 'password1',
            'middleName'    => 'middleName1',
            'subscriptions' => [
                [
                    'pointOfContact' => 'pointOfContact1',
                ],
                [
                    'pointOfContact' => 'pointOfContact2',
                ],
            ],
        ];

        $this->assertSame($array, $dto->getFieldsAsArray());

        $array['subscriptions'][CustomerRequestDTO::XML_ITEM_NAME_INDEX] = 'subscription';

        $this->assertSame($array, $dto->getFieldsAsArray(false));
    }

    public function testGetFieldsAsArrayByConstructor()
    {
        $array = [
            'password'      => 'password1',
            'middleName'    => 'middleName1',
            'subscriptions' => [
                [
                    'pointOfContact' => 'pointOfContact1',
                ],
                [
                    'pointOfContact' => 'pointOfContact2',
                ],
            ],
        ];

        $dto = new CustomerRequestDTO($array);

        $this->assertSame($array, $dto->getFieldsAsArray());

        $array['subscriptions'][CustomerRequestDTO::XML_ITEM_NAME_INDEX] = 'subscription';

        $this->assertSame($array, $dto->getFieldsAsArray(false));
    }

    public function testGetFieldsAsArrayWithoutCollection()
    {
        $dto = new CustomerRequestDTO();
        $dto->setPassword('password1');
        $dto->setMiddleName('middleName1');

        $subscriptions = [];

        $subscription = new SubscriptionRequestDTO();
        $subscription->setPointOfContact('pointOfContact1');

        $subscriptions[] = $subscription;

        $subscription = new SubscriptionRequestDTO();
        $subscription->setPointOfContact('pointOfContact2');

        $subscriptions[] = $subscription;

        $dto->setSubscriptions($subscriptions);

        $array = [
            'password'      => 'password1',
            'middleName'    => 'middleName1',
            'subscriptions' => [
                [
                    'pointOfContact' => 'pointOfContact1',
                ],
                [
                    'pointOfContact' => 'pointOfContact2',
                ],
            ],
        ];

        $this->assertSame($array, $dto->getFieldsAsArray());

        $array['subscriptions'][CustomerRequestDTO::XML_ITEM_NAME_INDEX] = 'subscription';

        $this->assertSame($array, $dto->getFieldsAsArray(false));
    }

    public function testGetIsAuthorized()
    {
        $field = $this->dto->getIsAuthorized();

        $this->assertSame('some_isAuthorized', $field);
    }

    public function testSetIsAuthorized()
    {
        $this->dto->setIsAuthorized('new_isAuthorized');
        $field = $this->dto->getIsAuthorized();

        $this->assertSame('new_isAuthorized', $field);
    }
}
