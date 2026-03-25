<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CatalogContract;
use SDKLimes\Services\API\Catalog\CategoryService;
use SDKLimes\Services\API\Catalog\ProductsService;
use SDKLimes\Services\API\Catalog\SearchService;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class CatalogService implements CatalogContract
{
    /**
     * @api
     */
    public CatalogRawService $raw;

    /**
     * @api
     */
    public SearchService $search;

    /**
     * @api
     */
    public CategoryService $category;

    /**
     * @api
     */
    public ProductsService $products;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CatalogRawService($client);
        $this->search = new SearchService($client);
        $this->category = new CategoryService($client);
        $this->products = new ProductsService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCategories(
        ?int $limit = null,
        ?int $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['limit' => $limit, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listCategories(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
