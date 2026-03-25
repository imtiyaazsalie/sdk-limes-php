<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Update;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\CRM\Update\AccountCustomer\Detail;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Update\AccountCustomer\Detail
 *
 * @phpstan-type AccountCustomerShape = array{
 *   address?: list<AccountAddress|AccountAddressShape>|null,
 *   detail?: null|Detail|DetailShape,
 *   isResidential?: bool|null,
 * }
 */
final class AccountCustomer implements BaseModel
{
    /** @use SdkModel<AccountCustomerShape> */
    use SdkModel;

    /** @var list<AccountAddress>|null $address */
    #[Optional(list: AccountAddress::class, nullable: true)]
    public ?array $address;

    #[Optional]
    public ?Detail $detail;

    #[Optional]
    public ?bool $isResidential;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AccountAddress|AccountAddressShape>|null $address
     * @param Detail|DetailShape|null $detail
     */
    public static function with(
        ?array $address = null,
        Detail|array|null $detail = null,
        ?bool $isResidential = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $detail && $self['detail'] = $detail;
        null !== $isResidential && $self['isResidential'] = $isResidential;

        return $self;
    }

    /**
     * @param list<AccountAddress|AccountAddressShape>|null $address
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

    public function withIsResidential(bool $isResidential): self
    {
        $self = clone $this;
        $self['isResidential'] = $isResidential;

        return $self;
    }
}
