<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data;
use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\MvnxContract;
use SDKLimes\Services\API\Mvnx\HistoryService;

/**
 * @phpstan-import-type DataShape from \SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class MvnxService implements MvnxContract
{
    /**
     * @api
     */
    public MvnxRawService $raw;

    /**
     * @api
     */
    public HistoryService $history;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MvnxRawService($client);
        $this->history = new HistoryService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'newMsisdn' => $newMsisdn,
                'oldMsisdn' => $oldMsisdn,
                'portedAt' => $portedAt,
                'reference' => $reference,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createPort(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'data' => $data,
                'receivedOn' => $receivedOn,
                'sentOn' => $sentOn,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createWebhook(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
