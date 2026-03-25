<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack;

use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\PaystackService::cancelSubscription()
 *
 * @phpstan-type PaystackCancelSubscriptionParamsShape = array{
 *   msisdn: string, productID: string
 * }
 */
final class PaystackCancelSubscriptionParams implements BaseModel
{
    /** @use SdkModel<PaystackCancelSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $msisdn;

    #[Required('productId')]
    public string $productID;

    /**
     * `new PaystackCancelSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaystackCancelSubscriptionParams::with(msisdn: ..., productID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaystackCancelSubscriptionParams)->withMsisdn(...)->withProductID(...)
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
    public static function with(string $msisdn, string $productID): self
    {
        $self = new self;

        $self['msisdn'] = $msisdn;
        $self['productID'] = $productID;

        return $self;
    }

    public function withMsisdn(string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withProductID(string $productID): self
    {
        $self = clone $this;
        $self['productID'] = $productID;

        return $self;
    }
}
