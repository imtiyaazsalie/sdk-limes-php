<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\ComboBundle;

use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\ComboBundleService::recurring()
 *
 * @phpstan-type ComboBundleRecurringParamsShape = array{
 *   amount: int, msisdn: string, paymentMethodID: string, productID: string
 * }
 */
final class ComboBundleRecurringParams implements BaseModel
{
    /** @use SdkModel<ComboBundleRecurringParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $amount;

    #[Required]
    public string $msisdn;

    #[Required('paymentMethodId')]
    public string $paymentMethodID;

    #[Required('productId')]
    public string $productID;

    /**
     * `new ComboBundleRecurringParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComboBundleRecurringParams::with(
     *   amount: ..., msisdn: ..., paymentMethodID: ..., productID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComboBundleRecurringParams)
     *   ->withAmount(...)
     *   ->withMsisdn(...)
     *   ->withPaymentMethodID(...)
     *   ->withProductID(...)
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
        string $msisdn,
        string $paymentMethodID,
        string $productID
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['msisdn'] = $msisdn;
        $self['paymentMethodID'] = $paymentMethodID;
        $self['productID'] = $productID;

        return $self;
    }

    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withMsisdn(string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withPaymentMethodID(string $paymentMethodID): self
    {
        $self = clone $this;
        $self['paymentMethodID'] = $paymentMethodID;

        return $self;
    }

    public function withProductID(string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }
}
