<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\DynamicServices;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest\DefinitionCode;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type DynamicServiceRequestShape = array{
 *   definitionCode?: null|DefinitionCode|value-of<DefinitionCode>,
 *   expiryDate?: string|null,
 *   priceInCents?: int|null,
 *   transactionID?: string|null,
 *   value?: float|null,
 * }
 */
final class DynamicServiceRequest implements BaseModel
{
    /** @use SdkModel<DynamicServiceRequestShape> */
    use SdkModel;

    /** @var value-of<DefinitionCode>|null $definitionCode */
    #[Optional(enum: DefinitionCode::class)]
    public ?string $definitionCode;

    #[Optional(nullable: true)]
    public ?string $expiryDate;

    #[Optional]
    public ?int $priceInCents;

    #[Optional('transactionId', nullable: true)]
    public ?string $transactionID;

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
     *
     * @param DefinitionCode|value-of<DefinitionCode>|null $definitionCode
     */
    public static function with(
        DefinitionCode|string|null $definitionCode = null,
        ?string $expiryDate = null,
        ?int $priceInCents = null,
        ?string $transactionID = null,
        ?float $value = null,
    ): self {
        $self = new self;

        null !== $definitionCode && $self['definitionCode'] = $definitionCode;
        null !== $expiryDate && $self['expiryDate'] = $expiryDate;
        null !== $priceInCents && $self['priceInCents'] = $priceInCents;
        null !== $transactionID && $self['transactionID'] = $transactionID;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * @param DefinitionCode|value-of<DefinitionCode> $definitionCode
     */
    public function withDefinitionCode(
        DefinitionCode|string $definitionCode
    ): self {
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

    public function withPriceInCents(int $priceInCents): self
    {
        $self = clone $this;
        $self['priceInCents'] = $priceInCents;

        return $self;
    }

    public function withTransactionID(?string $transactionID): self
    {
        $self = clone $this;
        $self['transactionID'] = $transactionID;

        return $self;
    }

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
