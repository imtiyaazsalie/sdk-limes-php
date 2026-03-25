<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API;

use SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type DataShape from \SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface MvnxContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPort(
        string $newMsisdn,
        string $oldMsisdn,
        ?\DateTimeInterface $portedAt = null,
        ?string $reference = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param Data|DataShape $data
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createWebhook(
        ?string $id = null,
        Data|array|null $data = null,
        ?\DateTimeInterface $receivedOn = null,
        ?\DateTimeInterface $sentOn = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
