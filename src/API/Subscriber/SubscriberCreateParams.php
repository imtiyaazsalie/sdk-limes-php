<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber;

use SDKLimes\API\CRM\Store\Account\AccountAddress;
use SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\SubscriberService::create()
 *
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type RelatedPartyShape from \SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty
 *
 * @phpstan-type SubscriberCreateParamsShape = array{
 *   accountID?: string|null,
 *   address?: list<AccountAddress|AccountAddressShape>|null,
 *   eSim?: bool|null,
 *   iccid?: string|null,
 *   productID?: string|null,
 *   relatedParty?: list<RelatedParty|RelatedPartyShape>|null,
 *   transactionID?: string|null,
 * }
 */
final class SubscriberCreateParams implements BaseModel
{
    /** @use SdkModel<SubscriberCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('accountId', nullable: true)]
    public ?string $accountID;

    /** @var list<AccountAddress>|null $address */
    #[Optional(list: AccountAddress::class, nullable: true)]
    public ?array $address;

    #[Optional(nullable: true)]
    public ?bool $eSim;

    #[Optional(nullable: true)]
    public ?string $iccid;

    #[Optional('productId', nullable: true)]
    public ?string $productID;

    /** @var list<RelatedParty>|null $relatedParty */
    #[Optional(list: RelatedParty::class, nullable: true)]
    public ?array $relatedParty;

    #[Optional('transactionId', nullable: true)]
    public ?string $transactionID;

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
     * @param list<RelatedParty|RelatedPartyShape>|null $relatedParty
     */
    public static function with(
        ?string $accountID = null,
        ?array $address = null,
        ?bool $eSim = null,
        ?string $iccid = null,
        ?string $productID = null,
        ?array $relatedParty = null,
        ?string $transactionID = null,
    ): self {
        $self = new self;

        null !== $accountID && $self['accountID'] = $accountID;
        null !== $address && $self['address'] = $address;
        null !== $eSim && $self['eSim'] = $eSim;
        null !== $iccid && $self['iccid'] = $iccid;
        null !== $productID && $self['productID'] = $productID;
        null !== $relatedParty && $self['relatedParty'] = $relatedParty;
        null !== $transactionID && $self['transactionID'] = $transactionID;

        return $self;
    }

    public function withAccountID(?string $accountID): self
    {
        $self = clone $this;
        $self['accountID'] = $accountID;

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

    public function withESim(?bool $eSim): self
    {
        $self = clone $this;
        $self['eSim'] = $eSim;

        return $self;
    }

    public function withIccid(?string $iccid): self
    {
        $self = clone $this;
        $self['iccid'] = $iccid;

        return $self;
    }

    public function withProductID(?string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }

    /**
     * @param list<RelatedParty|RelatedPartyShape>|null $relatedParty
     */
    public function withRelatedParty(?array $relatedParty): self
    {
        $self = clone $this;
        $self['relatedParty'] = $relatedParty;

        return $self;
    }

    public function withTransactionID(?string $transactionID): self
    {
        $self = clone $this;
        $self['transactionID'] = $transactionID;

        return $self;
    }
}
