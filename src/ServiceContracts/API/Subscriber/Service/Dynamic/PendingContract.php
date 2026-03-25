<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Subscriber\Service\Dynamic;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface PendingContract
{
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
    ): mixed;

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
    ): mixed;

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
    ): mixed;
}
