<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\Order\OrderCreateParams\Product;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\OrderContract;
use SDKLimes\Services\API\Order\PendingService;

/**
 * @phpstan-import-type ProductShape from \SDKLimes\API\Order\OrderCreateParams\Product
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class OrderService implements OrderContract
{
    /**
     * @api
     */
    public OrderRawService $raw;

    /**
     * @api
     */
    public PendingService $pending;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OrderRawService($client);
        $this->pending = new PendingService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(['msisdn' => $msisdn, 'products' => $products]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
