<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Rica;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Rica\UploadContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class UploadService implements UploadContract
{
    /**
     * @api
     */
    public UploadRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UploadRawService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(['file' => $file]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadID(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(['file' => $file]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadPoa(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
