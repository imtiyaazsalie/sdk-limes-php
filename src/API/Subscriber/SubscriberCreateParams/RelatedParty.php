<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber\SubscriberCreateParams;

use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Address;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Detail;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Email;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Phone;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AddressShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Address
 * @phpstan-import-type DetailShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Detail
 * @phpstan-import-type EmailShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Email
 * @phpstan-import-type PhoneShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty\Phone
 *
 * @phpstan-type RelatedPartyShape = array{
 *   id?: string|null,
 *   address?: list<Address|AddressShape>|null,
 *   detail?: null|Detail|DetailShape,
 *   email?: list<Email|EmailShape>|null,
 *   isAccountOwner?: bool|null,
 *   isServiceOwner?: bool|null,
 *   name?: string|null,
 *   personType?: string|null,
 *   phone?: list<Phone|PhoneShape>|null,
 *   primaryContactRole?: string|null,
 *   referredType?: string|null,
 *   useParentAddressType?: string|null,
 * }
 */
final class RelatedParty implements BaseModel
{
    /** @use SdkModel<RelatedPartyShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $id;

    /** @var list<Address>|null $address */
    #[Optional(list: Address::class, nullable: true)]
    public ?array $address;

    #[Optional]
    public ?Detail $detail;

    /** @var list<Email>|null $email */
    #[Optional(list: Email::class, nullable: true)]
    public ?array $email;

    #[Optional]
    public ?bool $isAccountOwner;

    #[Optional]
    public ?bool $isServiceOwner;

    #[Optional(nullable: true)]
    public ?string $name;

    #[Optional(nullable: true)]
    public ?string $personType;

    /** @var list<Phone>|null $phone */
    #[Optional(list: Phone::class, nullable: true)]
    public ?array $phone;

    #[Optional(nullable: true)]
    public ?string $primaryContactRole;

    #[Optional(nullable: true)]
    public ?string $referredType;

    #[Optional(nullable: true)]
    public ?string $useParentAddressType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Address|AddressShape>|null $address
     * @param Detail|DetailShape|null $detail
     * @param list<Email|EmailShape>|null $email
     * @param list<Phone|PhoneShape>|null $phone
     */
    public static function with(
        ?string $id = null,
        ?array $address = null,
        Detail|array|null $detail = null,
        ?array $email = null,
        ?bool $isAccountOwner = null,
        ?bool $isServiceOwner = null,
        ?string $name = null,
        ?string $personType = null,
        ?array $phone = null,
        ?string $primaryContactRole = null,
        ?string $referredType = null,
        ?string $useParentAddressType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $address && $self['address'] = $address;
        null !== $detail && $self['detail'] = $detail;
        null !== $email && $self['email'] = $email;
        null !== $isAccountOwner && $self['isAccountOwner'] = $isAccountOwner;
        null !== $isServiceOwner && $self['isServiceOwner'] = $isServiceOwner;
        null !== $name && $self['name'] = $name;
        null !== $personType && $self['personType'] = $personType;
        null !== $phone && $self['phone'] = $phone;
        null !== $primaryContactRole && $self['primaryContactRole'] = $primaryContactRole;
        null !== $referredType && $self['referredType'] = $referredType;
        null !== $useParentAddressType && $self['useParentAddressType'] = $useParentAddressType;

        return $self;
    }

    public function withID(?string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<Address|AddressShape>|null $address
     */
    public function withAddress(?array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * @param Detail|DetailShape $detail
     */
    public function withDetail(Detail|array $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    /**
     * @param list<Email|EmailShape>|null $email
     */
    public function withEmail(?array $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withIsAccountOwner(bool $isAccountOwner): self
    {
        $self = clone $this;
        $self['isAccountOwner'] = $isAccountOwner;

        return $self;
    }

    public function withIsServiceOwner(bool $isServiceOwner): self
    {
        $self = clone $this;
        $self['isServiceOwner'] = $isServiceOwner;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPersonType(?string $personType): self
    {
        $self = clone $this;
        $self['personType'] = $personType;

        return $self;
    }

    /**
     * @param list<Phone|PhoneShape>|null $phone
     */
    public function withPhone(?array $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    public function withPrimaryContactRole(?string $primaryContactRole): self
    {
        $self = clone $this;
        $self['primaryContactRole'] = $primaryContactRole;

        return $self;
    }

    public function withReferredType(?string $referredType): self
    {
        $self = clone $this;
        $self['referredType'] = $referredType;

        return $self;
    }

    public function withUseParentAddressType(
        ?string $useParentAddressType
    ): self {
        $self = clone $this;
        $self['useParentAddressType'] = $useParentAddressType;

        return $self;
    }
}
