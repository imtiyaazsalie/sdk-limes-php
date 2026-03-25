<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\PaymentService::listTransactions()
 *
 * @phpstan-type PaymentListTransactionsParamsShape = array{limit?: int|null}
 */
final class PaymentListTransactionsParams implements BaseModel
{
    /** @use SdkModel<PaymentListTransactionsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $limit = null): self
    {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
