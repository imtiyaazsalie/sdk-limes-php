<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM;

use SDKLimes\API\CRM\Search\SearchListAccountsParams;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SearchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SearchListAccountsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listAccounts(
        array|SearchListAccountsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
