<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM;

use SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface UpdateRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UpdateUpdateCustomerParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateCustomer(
        array|UpdateUpdateCustomerParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
