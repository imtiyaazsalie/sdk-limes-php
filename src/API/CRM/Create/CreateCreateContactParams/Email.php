<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\CreateCreateContactParams;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailShape = array{
 *   displayOrder?: int|null,
 *   emailAddress?: string|null,
 *   referredType?: string|null,
 * }
 */
final class Email implements BaseModel
{
    /** @use SdkModel<EmailShape> */
    use SdkModel;

    #[Optional]
    public ?int $displayOrder;

    #[Optional(nullable: true)]
    public ?string $emailAddress;

    #[Optional(nullable: true)]
    public ?string $referredType;

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
        ?int $displayOrder = null,
        ?string $emailAddress = null,
        ?string $referredType = null,
    ): self {
        $self = new self;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $emailAddress && $self['emailAddress'] = $emailAddress;
        null !== $referredType && $self['referredType'] = $referredType;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withEmailAddress(?string $emailAddress): self
    {
        $self = clone $this;
        $self['emailAddress'] = $emailAddress;

        return $self;
    }

    public function withReferredType(?string $referredType): self
    {
        $self = clone $this;
        $self['referredType'] = $referredType;

        return $self;
    }
}
