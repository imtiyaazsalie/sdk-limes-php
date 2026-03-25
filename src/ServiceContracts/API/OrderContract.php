<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\Order\OrderCreateParams\Product;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type ProductShape from \SDKLimes\API\Order\OrderCreateParams\Product
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface OrderContract
{
    /**
     * @api
     *
     * @param list<Product|ProductShape>|null $products
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $msisdn = null,
        ?array $products = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
