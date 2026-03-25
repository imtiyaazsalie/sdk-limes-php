<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Rica;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface UploadContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadID(
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadPoa(
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
