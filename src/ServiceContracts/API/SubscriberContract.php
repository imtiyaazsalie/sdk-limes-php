<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type RelatedPartyShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SubscriberContract
{
    /**
     * @api
     *
     * @param list<AccountAddress|AccountAddressShape>|null $address
     * @param list<RelatedParty|RelatedPartyShape>|null $relatedParty
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $accountID = null,
        ?array $address = null,
        ?bool $eSim = null,
        ?string $iccid = null,
        ?string $productID = null,
        ?array $relatedParty = null,
        ?string $transactionID = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function activate(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getBalance(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUser(
        int $limit = 20,
        int $page = 1,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function isActive(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        ?string $accountID = null,
        ?string $active = null,
        ?string $addressID = null,
        ?string $catalogProductID = null,
        ?string $completeOrder = null,
        ?string $customerID = null,
        ?string $iccid = null,
        ?string $id = null,
        ?string $isVisible = null,
        ?int $limit = null,
        ?string $msisdn = null,
        ?string $ocsid = null,
        ?string $orderID = null,
        ?string $orderState = null,
        ?int $page = null,
        ?string $productType = null,
        ?string $serviceType = null,
        ?string $state = null,
        ?string $status = null,
        ?string $waybill = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
