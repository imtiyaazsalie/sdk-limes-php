<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\Resources\Inventory;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SimContract
{
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
    ): mixed;
}
