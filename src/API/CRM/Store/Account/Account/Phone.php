<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account\Account;

use SDKLimes\API\CRM\Store\Account\ContactType;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneShape = array{
 *   contactType?: null|ContactType|value-of<ContactType>,
 *   phoneNumber?: string|null,
 * }
 */
final class Phone implements BaseModel
{
    /** @use SdkModel<PhoneShape> */
    use SdkModel;

    /** @var value-of<ContactType>|null $contactType */
    #[Optional(enum: ContactType::class)]
    public ?string $contactType;

    #[Optional(nullable: true)]
    public ?string $phoneNumber;

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
        ?string $phoneNumber = null
    ): self {
        $self = new self;

        null !== $contactType && $self['contactType'] = $contactType;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

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

    public function withPhoneNumber(?string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
