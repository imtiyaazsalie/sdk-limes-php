<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\Subscriber\SubscriberCreateParams;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty;
use SDKLimes\API\Subscriber\SubscriberGetUserParams;
use SDKLimes\API\Subscriber\SubscriberSearchParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\SubscriberRawContract;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type RelatedPartyShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SubscriberRawService implements SubscriberRawContract
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
     *   accountID?: string|null,
     *   address?: list<AccountAddress|AccountAddressShape>|null,
     *   eSim?: bool|null,
     *   iccid?: string|null,
     *   productID?: string|null,
     *   relatedParty?: list<RelatedParty|RelatedPartyShape>|null,
     *   transactionID?: string|null,
     * }|SubscriberCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|SubscriberCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/Subscriber/create',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieve(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/Subscriber/%1$s', $msisdn],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function activate(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/Subscriber/%1$s/activate', $msisdn],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getBalance(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/Subscriber/%1$s/balance', $msisdn],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{limit?: int, page?: int}|SubscriberGetUserParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getUser(
        array|SubscriberGetUserParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberGetUserParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/Subscriber/user',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function isActive(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/Subscriber/%1$s/is-active', $msisdn],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   accountID?: string,
     *   active?: string,
     *   addressID?: string,
     *   catalogProductID?: string,
     *   completeOrder?: string,
     *   customerID?: string,
     *   iccid?: string,
     *   id?: string,
     *   isVisible?: string,
     *   limit?: int,
     *   msisdn?: string,
     *   ocsid?: string,
     *   orderID?: string,
     *   orderState?: string,
     *   page?: int,
     *   productType?: string,
     *   serviceType?: string,
     *   state?: string,
     *   status?: string,
     *   waybill?: string,
     * }|SubscriberSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function search(
        array|SubscriberSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SubscriberSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/Subscriber/search',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'accountID' => 'AccountId',
                    'active' => 'Active',
                    'addressID' => 'AddressId',
                    'catalogProductID' => 'CatalogProductId',
                    'completeOrder' => 'CompleteOrder',
                    'customerID' => 'CustomerId',
                    'iccid' => 'Iccid',
                    'id' => 'Id',
                    'isVisible' => 'IsVisible',
                    'limit' => 'Limit',
                    'msisdn' => 'Msisdn',
                    'ocsid' => 'Ocsid',
                    'orderID' => 'OrderId',
                    'orderState' => 'OrderState',
                    'page' => 'Page',
                    'productType' => 'ProductType',
                    'serviceType' => 'ServiceType',
                    'state' => 'State',
                    'status' => 'Status',
                    'waybill' => 'Waybill',
                ],
            ),
            options: $options,
            convert: null,
        );
    }
}
