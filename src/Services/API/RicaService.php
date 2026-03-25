<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\RicaContract;
use SDKLimes\Services\API\Rica\UploadService;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class RicaService implements RicaContract
{
    /**
     * @api
     */
    public RicaRawService $raw;

    /**
     * @api
     */
    public UploadService $upload;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RicaRawService($client);
        $this->upload = new UploadService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveDocument(
        string $type,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveDocument($type, requestOptions: $requestOptions);

        return $response->parse();
    }
}
