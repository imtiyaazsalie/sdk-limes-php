<?php

declare(strict_types=1);

namespace SDKLimes\API\Auth;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\AuthService::createToken()
 *
 * @phpstan-type AuthCreateTokenParamsShape = array{
 *   email?: string|null,
 *   role?: string|null,
 *   secret?: string|null,
 *   tenant?: string|null,
 * }
 */
final class AuthCreateTokenParams implements BaseModel
{
    /** @use SdkModel<AuthCreateTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $email;

    #[Optional(nullable: true)]
    public ?string $role;

    #[Optional(nullable: true)]
    public ?string $secret;

    #[Optional(nullable: true)]
    public ?string $tenant;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $email = null,
        ?string $role = null,
        ?string $secret = null,
        ?string $tenant = null,
    ): self {
        $self = new self;

        null !== $email && $self['email'] = $email;
        null !== $role && $self['role'] = $role;
        null !== $secret && $self['secret'] = $secret;
        null !== $tenant && $self['tenant'] = $tenant;

        return $self;
    }

    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withRole(?string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    public function withSecret(?string $secret): self
    {
        $self = clone $this;
        $self['secret'] = $secret;

        return $self;
    }

    public function withTenant(?string $tenant): self
    {
        $self = clone $this;
        $self['tenant'] = $tenant;

        return $self;
    }
}
