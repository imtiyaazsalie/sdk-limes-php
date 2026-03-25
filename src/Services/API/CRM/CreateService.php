<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\API\CRM\Create\CreateCreateContactParams\Address;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Email;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\CreateContract;
use SDKLimes\Services\API\CRM\Create\AccountService;

/**
 * @phpstan-import-type AddressShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Address
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail
 * @phpstan-import-type EmailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Email
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone
 * @phpstan-import-type PropertyOptionShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class CreateService implements CreateContract
{
    /**
     * @api
     */
    public CreateRawService $raw;

    /**
     * @api
     */
    public AccountService $account;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CreateRawService($client);
        $this->account = new AccountService($client);
    }

    /**
     * @api
     *
     * @param list<Address|AddressShape>|null $address
     * @param Detail|DetailShape $detail
     * @param list<Email|EmailShape>|null $email
     * @param list<Phone|PhoneShape>|null $phone
     * @param list<PropertyOption|PropertyOptionShape>|null $propertyOption
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createContact(
        ?array $address = null,
        Detail|array|null $detail = null,
        ?array $email = null,
        ?string $externalReference = null,
        ?string $name = null,
        ?string $personType = null,
        ?array $phone = null,
        ?array $propertyOption = null,
        ?string $referredType = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'detail' => $detail,
                'email' => $email,
                'externalReference' => $externalReference,
                'name' => $name,
                'personType' => $personType,
                'phone' => $phone,
                'propertyOption' => $propertyOption,
                'referredType' => $referredType,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createContact(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
