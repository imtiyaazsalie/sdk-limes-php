<?php

declare(strict_types=1);

namespace SDKLimes\API\User;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\UserService::register()
 *
 * @phpstan-type UserRegisterParamsShape = array{
 *   emailAddress?: string|null,
 *   externalID?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   tenant?: string|null,
 * }
 */
final class UserRegisterParams implements BaseModel
{
    /** @use SdkModel<UserRegisterParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $emailAddress;

    #[Optional('externalId', nullable: true)]
    public ?string $externalID;

    #[Optional(nullable: true)]
    public ?string $firstName;

    #[Optional(nullable: true)]
    public ?string $lastName;

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
        ?string $emailAddress = null,
        ?string $externalID = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $tenant = null,
    ): self {
        $self = new self;

        null !== $emailAddress && $self['emailAddress'] = $emailAddress;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $tenant && $self['tenant'] = $tenant;

        return $self;
    }

    public function withEmailAddress(?string $emailAddress): self
    {
        $self = clone $this;
        $self['emailAddress'] = $emailAddress;

        return $self;
    }

    public function withExternalID(?string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

        return $self;
    }

    public function withFirstName(?string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(?string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withTenant(?string $tenant): self
    {
        $self = clone $this;
        $self['tenant'] = $tenant;

        return $self;
    }
}
