<?php

declare(strict_types=1);

namespace SDKLimes\ServiceContracts\API\CRM;

use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
interface SearchContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAccounts(
        ?string $bCycle = null,
        ?string $category = null,
        ?string $class = null,
        ?string $fName = null,
        ?string $id = null,
        ?string $idNum = null,
        ?string $idType = null,
        ?int $limit = null,
        ?string $lName = null,
        ?string $name = null,
        ?int $page = null,
        ?string $relID = null,
        ?string $state = null,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
