<?php

declare(strict_types=1);

namespace SDKLimes\API\User;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\UserService::updateSimDescription()
 *
 * @phpstan-type UserUpdateSimDescriptionParamsShape = array{
 *   msisdn: string|null, simDescription?: string|null
 * }
 */
final class UserUpdateSimDescriptionParams implements BaseModel
{
    /** @use SdkModel<UserUpdateSimDescriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public ?string $msisdn;

    #[Optional(nullable: true)]
    public ?string $simDescription;

    /**
     * `new UserUpdateSimDescriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserUpdateSimDescriptionParams::with(msisdn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserUpdateSimDescriptionParams)->withMsisdn(...)
     * ```
     */
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
        ?string $msisdn,
        ?string $simDescription = null
    ): self {
        $self = new self;

        $self['msisdn'] = $msisdn;

        null !== $simDescription && $self['simDescription'] = $simDescription;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withSimDescription(?string $simDescription): self
    {
        $self = clone $this;
        $self['simDescription'] = $simDescription;

        return $self;
    }
}
