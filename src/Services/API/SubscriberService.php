<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\SubscriberContract;
use SDKLimes\Services\API\Subscriber\ServiceService;
use SDKLimes\Services\API\Subscriber\SwapService;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type RelatedPartyShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SubscriberService implements SubscriberContract
{
    /**
     * @api
     */
    public SubscriberRawService $raw;

    /**
     * @api
     */
    public ServiceService $service;

    /**
     * @api
     */
    public SwapService $swap;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SubscriberRawService($client);
        $this->service = new ServiceService($client);
        $this->swap = new SwapService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'accountID' => $accountID,
                'address' => $address,
                'eSim' => $eSim,
                'iccid' => $iccid,
                'productID' => $productID,
                'relatedParty' => $relatedParty,
                'transactionID' => $transactionID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->activate($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBalance($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(['limit' => $limit, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getUser(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->isActive($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'accountID' => $accountID,
                'active' => $active,
                'addressID' => $addressID,
                'catalogProductID' => $catalogProductID,
                'completeOrder' => $completeOrder,
                'customerID' => $customerID,
                'iccid' => $iccid,
                'id' => $id,
                'isVisible' => $isVisible,
                'limit' => $limit,
                'msisdn' => $msisdn,
                'ocsid' => $ocsid,
                'orderID' => $orderID,
                'orderState' => $orderState,
                'page' => $page,
                'productType' => $productType,
                'serviceType' => $serviceType,
                'state' => $state,
                'status' => $status,
                'waybill' => $waybill,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
