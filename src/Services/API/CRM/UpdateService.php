<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams\Detail;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\UpdateContract;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams\Detail
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class UpdateService implements UpdateContract
{
    /**
     * @api
     */
    public UpdateRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UpdateRawService($client);
    }

    /**
     * @api
     *
     * @param list<AccountAddress|AccountAddressShape>|null $address
     * @param Detail|DetailShape $detail
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateCustomer(
        ?array $address = null,
        Detail|array|null $detail = null,
        ?bool $isResidential = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'address' => $address,
                'detail' => $detail,
                'isResidential' => $isResidential,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateCustomer(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
