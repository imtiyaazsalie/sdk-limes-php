<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams;
use SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams\Detail;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\UpdateRawContract;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams\Detail
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class UpdateRawService implements UpdateRawContract
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
     *   detail?: Detail|DetailShape,
     *   isResidential?: bool,
     * }|UpdateUpdateCustomerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateCustomer(
        array|UpdateUpdateCustomerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UpdateUpdateCustomerParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: 'api/Crm/update/customer',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
