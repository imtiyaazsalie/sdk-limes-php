<?php

declare(strict_types=1);

namespace SDKLimes\API\Order\OrderCreateParams;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProductShape = array{id?: string|null, amount?: float|null}
 */
final class Product implements BaseModel
{
    /** @use SdkModel<ProductShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $id;

    #[Optional(nullable: true)]
    public ?float $amount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?float $amount = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amount && $self['amount'] = $amount;

        return $self;
    }

    public function withID(?string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAmount(?float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }
}
