<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Catalog;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Catalog\ProductsContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class ProductsService implements ProductsContract
{
    /**
     * @api
     */
    public ProductsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProductsRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listByCategory(
        string $categoryCode,
        ?bool $descendants = null,
        ?int $limit = null,
        ?int $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['descendants' => $descendants, 'limit' => $limit, 'page' => $page]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listByCategory($categoryCode, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
