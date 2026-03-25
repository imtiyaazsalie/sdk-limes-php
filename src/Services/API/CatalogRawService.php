<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\Catalog\CatalogListCategoriesParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CatalogRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class CatalogRawService implements CatalogRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{limit?: int, page?: int}|CatalogListCategoriesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listCategories(
        array|CatalogListCategoriesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CatalogListCategoriesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/Catalog/categories',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
