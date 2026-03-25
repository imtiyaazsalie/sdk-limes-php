<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM\Store;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\CollectionPlan;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Contact;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Phone;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\TaxScheme;
use SDKLimes\API\CRM\Update\AccountCustomer;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\Store\AccountRawContract;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type CollectionPlanShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\CollectionPlan
 * @phpstan-import-type ContactShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Contact
 * @phpstan-import-type AccountCustomerShape from \SDKLimes\API\CRM\Update\AccountCustomer
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Phone
 * @phpstan-import-type TaxSchemeShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\TaxScheme
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class AccountRawService implements AccountRawContract
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
     *   address?: list<AccountAddress|AccountAddressShape>|null,
     *   collectionPlan?: CollectionPlan|CollectionPlanShape,
     *   contact?: Contact|ContactShape,
     *   customer?: AccountCustomer|AccountCustomerShape,
     *   detail?: Detail|DetailShape,
     *   isResidential?: bool,
     *   phone?: Phone|PhoneShape,
     *   taxScheme?: TaxScheme|TaxSchemeShape,
     * }|AccountCreateCustomerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createCustomer(
        array|AccountCreateCustomerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccountCreateCustomerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Crm/store/account/customer',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
