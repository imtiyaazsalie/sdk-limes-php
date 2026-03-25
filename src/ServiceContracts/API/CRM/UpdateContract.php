<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams\Detail;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams\Detail
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface UpdateContract
{
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
    ): mixed;
}
