<?php

declare(strict_types=1);

namespace SDKLimes\Services\API\CRM;

use SDKLimes\API\CRM\Search\SearchListAccountsParams;
use SDKLimes\Client;
use SDKLimes\Core\Contracts\BaseResponse;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\CRM\SearchRawContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class SearchRawService implements SearchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   bCycle?: string,
     *   category?: string,
     *   class?: string,
     *   fName?: string,
     *   id?: string,
     *   idNum?: string,
     *   idType?: string,
     *   limit?: int,
     *   lName?: string,
     *   name?: string,
     *   page?: int,
     *   relID?: string,
     *   state?: string,
     *   type?: string,
     * }|SearchListAccountsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listAccounts(
        array|SearchListAccountsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SearchListAccountsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/Crm/search/accounts',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'bCycle' => 'BCycle',
                    'category' => 'Category',
                    'class' => 'Class',
                    'fName' => 'FName',
                    'id' => 'Id',
                    'idNum' => 'IdNum',
                    'idType' => 'IdType',
                    'limit' => 'Limit',
                    'lName' => 'LName',
                    'name' => 'Name',
                    'page' => 'Page',
                    'relID' => 'RelId',
                    'state' => 'State',
                    'type' => 'Type',
                ],
            ),
            options: $options,
            convert: null,
        );
    }
}
