<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\Resources\Inventory;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\Resources\Inventory\SimContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SimService implements SimContract
{
    /**
     * @api
     */
    public SimRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SimRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        ?string $id = null,
        ?string $accessNo = null,
        ?string $dealer = null,
        ?string $imsi = null,
        int $limit = 20,
        int $page = 1,
        ?string $status = null,
        ?string $subStatus = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'accessNo' => $accessNo,
                'dealer' => $dealer,
                'imsi' => $imsi,
                'limit' => $limit,
                'page' => $page,
                'status' => $status,
                'subStatus' => $subStatus,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
