<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\SearchContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SearchService implements SearchContract
{
    /**
     * @api
     */
    public SearchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SearchRawService($client);
    }

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
    ): mixed {
        $params = Util::removeNulls(
            [
                'bCycle' => $bCycle,
                'category' => $category,
                'class' => $class,
                'fName' => $fName,
                'id' => $id,
                'idNum' => $idNum,
                'idType' => $idType,
                'limit' => $limit,
                'lName' => $lName,
                'name' => $name,
                'page' => $page,
                'relID' => $relID,
                'state' => $state,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAccounts(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
