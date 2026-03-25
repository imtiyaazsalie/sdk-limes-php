<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account\Account;

use SDKLimes\API\CRM\Store\Account\AddressType;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContactShape = array{
 *   isAccountOwner?: bool|null,
 *   isServiceOwner?: bool|null,
 *   primaryContactRole?: string|null,
 *   useParentAddressType?: null|AddressType|value-of<AddressType>,
 * }
 */
final class Contact implements BaseModel
{
    /** @use SdkModel<ContactShape> */
    use SdkModel;

    #[Optional]
    public ?bool $isAccountOwner;

    #[Optional]
    public ?bool $isServiceOwner;

    #[Optional(nullable: true)]
    public ?string $primaryContactRole;

    /** @var value-of<AddressType>|null $useParentAddressType */
    #[Optional(enum: AddressType::class)]
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
     * @param AddressType|value-of<AddressType>|null $useParentAddressType
     */
    public static function with(
        ?bool $isAccountOwner = null,
        ?bool $isServiceOwner = null,
        ?string $primaryContactRole = null,
        AddressType|string|null $useParentAddressType = null,
    ): self {
        $self = new self;

        null !== $isAccountOwner && $self['isAccountOwner'] = $isAccountOwner;
        null !== $isServiceOwner && $self['isServiceOwner'] = $isServiceOwner;
        null !== $primaryContactRole && $self['primaryContactRole'] = $primaryContactRole;
        null !== $useParentAddressType && $self['useParentAddressType'] = $useParentAddressType;

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

    public function withPrimaryContactRole(?string $primaryContactRole): self
    {
        $self = clone $this;
        $self['primaryContactRole'] = $primaryContactRole;

        return $self;
    }

    /**
     * @param AddressType|value-of<AddressType> $useParentAddressType
     */
    public function withUseParentAddressType(
        AddressType|string $useParentAddressType
    ): self {
        $self = clone $this;
        $self['useParentAddressType'] = $useParentAddressType;

        return $self;
    }
}
