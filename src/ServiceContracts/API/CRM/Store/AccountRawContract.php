<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM\Store;

use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface AccountRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AccountCreateCustomerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createCustomer(
        array|AccountCreateCustomerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
