<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create;

use SDKLimes\API\CRM\Create\CreateCreateContactParams\Address;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Email;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\CRM\CreateService::createContact()
 *
 * @phpstan-import-type AddressShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Address
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail
 * @phpstan-import-type EmailShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Email
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Phone
 * @phpstan-import-type PropertyOptionShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption
 *
 * @phpstan-type CreateCreateContactParamsShape = array{
 *   address?: list<Address|AddressShape>|null,
 *   detail?: null|Detail|DetailShape,
 *   email?: list<Email|EmailShape>|null,
 *   externalReference?: string|null,
 *   name?: string|null,
 *   personType?: string|null,
 *   phone?: list<Phone|PhoneShape>|null,
 *   propertyOption?: list<PropertyOption|PropertyOptionShape>|null,
 *   referredType?: string|null,
 * }
 */
final class CreateCreateContactParams implements BaseModel
{
    /** @use SdkModel<CreateCreateContactParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<Address>|null $address */
    #[Optional(list: Address::class, nullable: true)]
    public ?array $address;

    #[Optional]
    public ?Detail $detail;

    /** @var list<Email>|null $email */
    #[Optional(list: Email::class, nullable: true)]
    public ?array $email;

    #[Optional(nullable: true)]
    public ?string $externalReference;

    #[Optional(nullable: true)]
    public ?string $name;

    #[Optional(nullable: true)]
    public ?string $personType;

    /** @var list<Phone>|null $phone */
    #[Optional(list: Phone::class, nullable: true)]
    public ?array $phone;

    /** @var list<PropertyOption>|null $propertyOption */
    #[Optional(list: PropertyOption::class, nullable: true)]
    public ?array $propertyOption;

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
     * @param list<Address|AddressShape>|null $address
     * @param Detail|DetailShape|null $detail
     * @param list<Email|EmailShape>|null $email
     * @param list<Phone|PhoneShape>|null $phone
     * @param list<PropertyOption|PropertyOptionShape>|null $propertyOption
     */
    public static function with(
        ?array $address = null,
        Detail|array|null $detail = null,
        ?array $email = null,
        ?string $externalReference = null,
        ?string $name = null,
        ?string $personType = null,
        ?array $phone = null,
        ?array $propertyOption = null,
        ?string $referredType = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $detail && $self['detail'] = $detail;
        null !== $email && $self['email'] = $email;
        null !== $externalReference && $self['externalReference'] = $externalReference;
        null !== $name && $self['name'] = $name;
        null !== $personType && $self['personType'] = $personType;
        null !== $phone && $self['phone'] = $phone;
        null !== $propertyOption && $self['propertyOption'] = $propertyOption;
        null !== $referredType && $self['referredType'] = $referredType;

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

    public function withExternalReference(?string $externalReference): self
    {
        $self = clone $this;
        $self['externalReference'] = $externalReference;

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

    /**
     * @param list<PropertyOption|PropertyOptionShape>|null $propertyOption
     */
    public function withPropertyOption(?array $propertyOption): self
    {
        $self = clone $this;
        $self['propertyOption'] = $propertyOption;

        return $self;
    }

    public function withReferredType(?string $referredType): self
    {
        $self = clone $this;
        $self['referredType'] = $referredType;

        return $self;
    }
}
