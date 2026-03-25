<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM;

use SDKLimes\API\CRM\Create\CreateCreateContactParams\Address;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Email;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type AddressShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Address
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail
 * @phpstan-import-type EmailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Email
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone
 * @phpstan-import-type PropertyOptionShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface CreateContract
{
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
    ): mixed;
}
