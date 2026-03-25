<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Catalog;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Catalog\SearchContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SearchService implements SearchContract
{
    /**
     * @api
     */
    public SearchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SearchRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listProducts(
        ?string $id = null,
        ?string $adhoc = null,
        int $limit = 20,
        int $page = 1,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['id' => $id, 'adhoc' => $adhoc, 'limit' => $limit, 'page' => $page]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listProducts(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveProduct(
        string $productID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveProduct($productID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
