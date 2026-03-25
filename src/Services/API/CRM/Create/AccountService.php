<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM\Create;

use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\CollectionPlan;
use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Contact;
use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail;
use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Phone;
use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\TaxScheme;
use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\CRM\Update\AccountCustomer;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\Create\AccountContract;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type CollectionPlanShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\CollectionPlan
 * @phpstan-import-type ContactShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Contact
 * @phpstan-import-type AccountCustomerShape from \SDKLimes\API\CRM\Update\AccountCustomer
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Phone
 * @phpstan-import-type TaxSchemeShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\TaxScheme
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class AccountService implements AccountContract
{
    /**
     * @api
     */
    public AccountRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountRawService($client);
    }

    /**
     * @api
     *
     * @param list<AccountAddress|AccountAddressShape>|null $address
     * @param CollectionPlan|CollectionPlanShape $collectionPlan
     * @param Contact|ContactShape $contact
     * @param AccountCustomer|AccountCustomerShape $customer
     * @param Detail|DetailShape $detail
     * @param Phone|PhoneShape $phone
     * @param TaxScheme|TaxSchemeShape $taxScheme
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createCustomer(
        ?array $address = null,
        CollectionPlan|array|null $collectionPlan = null,
        Contact|array|null $contact = null,
        AccountCustomer|array|null $customer = null,
        Detail|array|null $detail = null,
        ?bool $isResidential = null,
        Phone|array|null $phone = null,
        TaxScheme|array|null $taxScheme = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'collectionPlan' => $collectionPlan,
                'contact' => $contact,
                'customer' => $customer,
                'detail' => $detail,
                'isResidential' => $isResidential,
                'phone' => $phone,
                'taxScheme' => $taxScheme,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createCustomer(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
