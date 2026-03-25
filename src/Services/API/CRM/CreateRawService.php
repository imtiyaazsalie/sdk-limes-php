<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\API\CRM\Create\CreateCreateContactParams;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Address;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Email;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\CreateRawContract;

/**
 * @phpstan-import-type AddressShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Address
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail
 * @phpstan-import-type EmailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Email
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone
 * @phpstan-import-type PropertyOptionShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class CreateRawService implements CreateRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   address?: list<Address|AddressShape>|null,
     *   detail?: Detail|DetailShape,
     *   email?: list<Email|EmailShape>|null,
     *   externalReference?: string|null,
     *   name?: string|null,
     *   personType?: string|null,
     *   phone?: list<Phone|PhoneShape>|null,
     *   propertyOption?: list<PropertyOption|PropertyOptionShape>|null,
     *   referredType?: string|null,
     * }|CreateCreateContactParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createContact(
        array|CreateCreateContactParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CreateCreateContactParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Crm/create/contact',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
