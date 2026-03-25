<?php

declare(strict_types=1);

namespace SDKLimes\API\Order\Pending;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Order\PendingService::create()
 *
 * @phpstan-type PendingCreateParamsShape = array{
 *   msisdn?: string|null,
 *   paymentReference?: string|null,
 *   productAmount?: float|null,
 *   productID?: string|null,
 * }
 */
final class PendingCreateParams implements BaseModel
{
    /** @use SdkModel<PendingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $msisdn;

    #[Optional(nullable: true)]
    public ?string $paymentReference;

    #[Optional(nullable: true)]
    public ?float $productAmount;

    #[Optional('productId', nullable: true)]
    public ?string $productID;

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
        ?string $msisdn = null,
        ?string $paymentReference = null,
        ?float $productAmount = null,
        ?string $productID = null,
    ): self {
        $self = new self;

        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $paymentReference && $self['paymentReference'] = $paymentReference;
        null !== $productAmount && $self['productAmount'] = $productAmount;
        null !== $productID && $self['productID'] = $productID;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withPaymentReference(?string $paymentReference): self
    {
        $self = clone $this;
        $self['paymentReference'] = $paymentReference;

        return $self;
    }

    public function withProductAmount(?float $productAmount): self
    {
        $self = clone $this;
        $self['productAmount'] = $productAmount;

        return $self;
    }

    public function withProductID(?string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }
}
