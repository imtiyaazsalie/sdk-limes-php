<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty;

use SDKLimes\API\CRM\Store\Account\ContactType;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneShape = array{
 *   contactType?: null|ContactType|value-of<ContactType>,
 *   displayOrder?: int|null,
 *   phoneNumber?: string|null,
 *   referredType?: string|null,
 * }
 */
final class Phone implements BaseModel
{
    /** @use SdkModel<PhoneShape> */
    use SdkModel;

    /** @var value-of<ContactType>|null $contactType */
    #[Optional(enum: ContactType::class)]
    public ?string $contactType;

    #[Optional]
    public ?int $displayOrder;

    #[Optional(nullable: true)]
    public ?string $phoneNumber;

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
     *
     * @param ContactType|value-of<ContactType>|null $contactType
     */
    public static function with(
        ContactType|string|null $contactType = null,
        ?int $displayOrder = null,
        ?string $phoneNumber = null,
        ?string $referredType = null,
    ): self {
        $self = new self;

        null !== $contactType && $self['contactType'] = $contactType;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $referredType && $self['referredType'] = $referredType;

        return $self;
    }

    /**
     * @param ContactType|value-of<ContactType> $contactType
     */
    public function withContactType(ContactType|string $contactType): self
    {
        $self = clone $this;
        $self['contactType'] = $contactType;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withPhoneNumber(?string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withReferredType(?string $referredType): self
    {
        $self = clone $this;
        $self['referredType'] = $referredType;

        return $self;
    }
}
