<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Catalog;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Catalog\CategoryContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class CategoryService implements CategoryContract
{
    /**
     * @api
     */
    public CategoryRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CategoryRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $categoryID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($categoryID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTree(
        ?string $groupCode = null,
        bool $groupOnly = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['groupCode' => $groupCode, 'groupOnly' => $groupOnly]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getTree(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
