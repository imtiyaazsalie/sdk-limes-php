<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack\PaystackVerifyParams;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{
 *   customerName?: string|null,
 *   customerPhone?: string|null,
 *   msisdn?: string|null,
 *   productID?: string|null,
 *   productName?: string|null,
 *   shippingAddress?: string|null,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $customerName;

    #[Optional(nullable: true)]
    public ?string $customerPhone;

    #[Optional(nullable: true)]
    public ?string $msisdn;

    #[Optional('productId', nullable: true)]
    public ?string $productID;

    #[Optional(nullable: true)]
    public ?string $productName;

    #[Optional(nullable: true)]
    public ?string $shippingAddress;

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
        ?string $customerName = null,
        ?string $customerPhone = null,
        ?string $msisdn = null,
        ?string $productID = null,
        ?string $productName = null,
        ?string $shippingAddress = null,
    ): self {
        $self = new self;

        null !== $customerName && $self['customerName'] = $customerName;
        null !== $customerPhone && $self['customerPhone'] = $customerPhone;
        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $productID && $self['productID'] = $productID;
        null !== $productName && $self['productName'] = $productName;
        null !== $shippingAddress && $self['shippingAddress'] = $shippingAddress;

        return $self;
    }

    public function withCustomerName(?string $customerName): self
    {
        $self = clone $this;
        $self['customerName'] = $customerName;

        return $self;
    }

    public function withCustomerPhone(?string $customerPhone): self
    {
        $self = clone $this;
        $self['customerPhone'] = $customerPhone;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withProductID(?string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }

    public function withProductName(?string $productName): self
    {
        $self = clone $this;
        $self['productName'] = $productName;

        return $self;
    }

    public function withShippingAddress(?string $shippingAddress): self
    {
        $self = clone $this;
        $self['shippingAddress'] = $shippingAddress;

        return $self;
    }
}
