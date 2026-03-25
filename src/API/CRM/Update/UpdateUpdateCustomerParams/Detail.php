<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Update\UpdateUpdateCustomerParams;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type DetailShape = array{
 *   firstname?: string|null,
 *   lastname?: string|null,
 *   requireSecurityQuestions?: bool|null,
 * }
 */
final class Detail implements BaseModel
{
    /** @use SdkModel<DetailShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $firstname;

    #[Optional(nullable: true)]
    public ?string $lastname;

    #[Optional]
    public ?bool $requireSecurityQuestions;

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
        ?string $firstname = null,
        ?string $lastname = null,
        ?bool $requireSecurityQuestions = null,
    ): self {
        $self = new self;

        null !== $firstname && $self['firstname'] = $firstname;
        null !== $lastname && $self['lastname'] = $lastname;
        null !== $requireSecurityQuestions && $self['requireSecurityQuestions'] = $requireSecurityQuestions;

        return $self;
    }

    public function withFirstname(?string $firstname): self
    {
        $self = clone $this;
        $self['firstname'] = $firstname;

        return $self;
    }

    public function withLastname(?string $lastname): self
    {
        $self = clone $this;
        $self['lastname'] = $lastname;

        return $self;
    }

    public function withRequireSecurityQuestions(
        bool $requireSecurityQuestions
    ): self {
        $self = clone $this;
        $self['requireSecurityQuestions'] = $requireSecurityQuestions;

        return $self;
    }
}
