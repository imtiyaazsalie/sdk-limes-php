<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM;

use SDKLimes\API\CRM\Create\CreateCreateContactParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface CreateRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CreateCreateContactParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createContact(
        array|CreateCreateContactParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
