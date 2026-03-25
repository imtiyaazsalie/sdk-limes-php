<?php

declare(strict_types=1);

namespace SDKLimes\Services\API;

use SDKLimes\Client;
use SDKLimes\Core\Exceptions\APIException;
use SDKLimes\Core\Util;
use SDKLimes\RequestOptions;
use SDKLimes\ServiceContracts\API\AuthContract;

/**
 * @phpstan-import-type RequestOpts from \SDKLimes\RequestOptions
 */
final class AuthService implements AuthContract
{
    /**
     * @api
     */
    public AuthRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createToken(
        ?string $email = null,
        ?string $role = null,
        ?string $secret = null,
        ?string $tenant = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'role' => $role,
                'secret' => $secret,
                'tenant' => $tenant,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createToken(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
