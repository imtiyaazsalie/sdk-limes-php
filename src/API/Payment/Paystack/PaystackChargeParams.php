<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack;

use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\PaystackService::charge()
 *
 * @phpstan-type PaystackChargeParamsShape = array{
 *   amount: int, paymentMethodID: string
 * }
 */
final class PaystackChargeParams implements BaseModel
{
    /** @use SdkModel<PaystackChargeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $amount;

    #[Required('paymentMethodId')]
    public string $paymentMethodID;

    /**
     * `new PaystackChargeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaystackChargeParams::with(amount: ..., paymentMethodID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaystackChargeParams)->withAmount(...)->withPaymentMethodID(...)
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
    public static function with(int $amount, string $paymentMethodID): self
    {
        $self = new self;

        $self['amount'] = $amount;
        $self['paymentMethodID'] = $paymentMethodID;

        return $self;
    }

    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withPaymentMethodID(string $paymentMethodID): self
    {
        $self = clone $this;
        $self['paymentMethodID'] = $paymentMethodID;

        return $self;
    }
}
