<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @deprecated
 * @see SDKLimes\Services\API\Payment\PaystackService::initializeCombo()
 *
 * @phpstan-type PaystackInitializeComboParamsShape = array{
 *   amount: int, productID: string, msisdn?: string|null
 * }
 */
final class PaystackInitializeComboParams implements BaseModel
{
    /** @use SdkModel<PaystackInitializeComboParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $amount;

    #[Required('productId')]
    public string $productID;

    #[Optional(nullable: true)]
    public ?string $msisdn;

    /**
     * `new PaystackInitializeComboParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaystackInitializeComboParams::with(amount: ..., productID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaystackInitializeComboParams)->withAmount(...)->withProductID(...)
     * ```
     */
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
        int $amount,
        string $productID,
        ?string $msisdn = null
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['productID'] = $productID;

        null !== $msisdn && $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withProductID(string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }
}
