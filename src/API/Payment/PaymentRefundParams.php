<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\PaymentService::refund()
 *
 * @phpstan-type PaymentRefundParamsShape = array{
 *   reason: string, transactionReference: string, amountInCents?: int|null
 * }
 */
final class PaymentRefundParams implements BaseModel
{
    /** @use SdkModel<PaymentRefundParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $reason;

    #[Required]
    public string $transactionReference;

    #[Optional(nullable: true)]
    public ?int $amountInCents;

    /**
     * `new PaymentRefundParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentRefundParams::with(reason: ..., transactionReference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentRefundParams)->withReason(...)->withTransactionReference(...)
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
        string $reason,
        string $transactionReference,
        ?int $amountInCents = null
    ): self {
        $self = new self;

        $self['reason'] = $reason;
        $self['transactionReference'] = $transactionReference;

        null !== $amountInCents && $self['amountInCents'] = $amountInCents;

        return $self;
    }

    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    public function withTransactionReference(string $transactionReference): self
    {
        $self = clone $this;
        $self['transactionReference'] = $transactionReference;

        return $self;
    }

    public function withAmountInCents(?int $amountInCents): self
    {
        $self = clone $this;
        $self['amountInCents'] = $amountInCents;

        return $self;
    }
}
