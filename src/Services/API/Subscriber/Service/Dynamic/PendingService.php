<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Subscriber\Service\Dynamic;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Subscriber\Service\Dynamic\PendingContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class PendingService implements PendingContract
{
    /**
     * @api
     */
    public PendingRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PendingRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $msisdn,
        ?string $definitionCode = null,
        ?string $expiryDate = null,
        ?string $paymentReference = null,
        ?int $priceInCents = null,
        ?float $value = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'definitionCode' => $definitionCode,
                'expiryDate' => $expiryDate,
                'paymentReference' => $paymentReference,
                'priceInCents' => $priceInCents,
                'value' => $value,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($msisdn, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function process(
        string $msisdn,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->process($msisdn, requestOptions: $requestOptions);

        return $response->parse();
    }
}
