<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack;

use SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\PaystackService::verify()
 *
 * @phpstan-import-type MetadataShape from \SDKLimes\API\Payment\Paystack\PaystackVerifyParams\Metadata
 *
 * @phpstan-type PaystackVerifyParamsShape = array{
 *   reference: string,
 *   metadata?: null|Metadata|MetadataShape,
 *   saveCard?: bool|null,
 * }
 */
final class PaystackVerifyParams implements BaseModel
{
    /** @use SdkModel<PaystackVerifyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $reference;

    #[Optional]
    public ?Metadata $metadata;

    #[Optional]
    public ?bool $saveCard;

    /**
     * `new PaystackVerifyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaystackVerifyParams::with(reference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaystackVerifyParams)->withReference(...)
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
     *
     * @param Metadata|MetadataShape|null $metadata
     */
    public static function with(
        string $reference,
        Metadata|array|null $metadata = null,
        ?bool $saveCard = null
    ): self {
        $self = new self;

        $self['reference'] = $reference;

        null !== $metadata && $self['metadata'] = $metadata;
        null !== $saveCard && $self['saveCard'] = $saveCard;

        return $self;
    }

    public function withReference(string $reference): self
    {
        $self = clone $this;
        $self['reference'] = $reference;

        return $self;
    }

    /**
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withSaveCard(bool $saveCard): self
    {
        $self = clone $this;
        $self['saveCard'] = $saveCard;

        return $self;
    }
}
