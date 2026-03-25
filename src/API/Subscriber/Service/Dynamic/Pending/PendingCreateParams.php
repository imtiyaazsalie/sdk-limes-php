<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber\Service\Dynamic\Pending;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Subscriber\Service\Dynamic\PendingService::create()
 *
 * @phpstan-type PendingCreateParamsShape = array{
 *   definitionCode?: string|null,
 *   expiryDate?: string|null,
 *   paymentReference?: string|null,
 *   priceInCents?: int|null,
 *   value?: float|null,
 * }
 */
final class PendingCreateParams implements BaseModel
{
    /** @use SdkModel<PendingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $definitionCode;

    #[Optional(nullable: true)]
    public ?string $expiryDate;

    #[Optional(nullable: true)]
    public ?string $paymentReference;

    #[Optional(nullable: true)]
    public ?int $priceInCents;

    #[Optional]
    public ?float $value;

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
        ?string $definitionCode = null,
        ?string $expiryDate = null,
        ?string $paymentReference = null,
        ?int $priceInCents = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $definitionCode && $self['definitionCode'] = $definitionCode;
        null !== $expiryDate && $self['expiryDate'] = $expiryDate;
        null !== $paymentReference && $self['paymentReference'] = $paymentReference;
        null !== $priceInCents && $self['priceInCents'] = $priceInCents;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withDefinitionCode(?string $definitionCode): self
    {
        $self = clone $this;
        $self['definitionCode'] = $definitionCode;

        return $self;
    }

    public function withExpiryDate(?string $expiryDate): self
    {
        $self = clone $this;
        $self['expiryDate'] = $expiryDate;

        return $self;
    }

    public function withPaymentReference(?string $paymentReference): self
    {
        $self = clone $this;
        $self['paymentReference'] = $paymentReference;

        return $self;
    }

    public function withPriceInCents(?int $priceInCents): self
    {
        $self = clone $this;
        $self['priceInCents'] = $priceInCents;

        return $self;
    }

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
