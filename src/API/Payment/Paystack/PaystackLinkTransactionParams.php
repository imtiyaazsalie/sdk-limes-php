<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack;

use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\PaystackService::linkTransaction()
 *
 * @phpstan-type PaystackLinkTransactionParamsShape = array{
 *   orderID: string, transactionReference: string
 * }
 */
final class PaystackLinkTransactionParams implements BaseModel
{
    /** @use SdkModel<PaystackLinkTransactionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('orderId')]
    public string $orderID;

    #[Required]
    public string $transactionReference;

    /**
     * `new PaystackLinkTransactionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaystackLinkTransactionParams::with(orderID: ..., transactionReference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaystackLinkTransactionParams)
     *   ->withOrderID(...)
     *   ->withTransactionReference(...)
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
        string $orderID,
        string $transactionReference
    ): self {
        $self = new self;

        $self['orderID'] = $orderID;
        $self['transactionReference'] = $transactionReference;

        return $self;
    }

    public function withOrderID(string $orderID): self
    {
        $self = clone $this;
        $self['orderID'] = $orderID;

        return $self;
    }

    public function withTransactionReference(string $transactionReference): self
    {
        $self = clone $this;
        $self['transactionReference'] = $transactionReference;

        return $self;
    }
}
