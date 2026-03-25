<?php

declare(strict_types=1);

namespace SDKLimes\API\Order;

use SDKLimes\API\Order\OrderCreateParams\Product;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\OrderService::create()
 *
 * @phpstan-import-type ProductShape from \SDKLimes\API\Order\OrderCreateParams\Product
 *
 * @phpstan-type OrderCreateParamsShape = array{
 *   msisdn?: string|null, products?: list<Product|ProductShape>|null
 * }
 */
final class OrderCreateParams implements BaseModel
{
    /** @use SdkModel<OrderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $msisdn;

    /** @var list<Product>|null $products */
    #[Optional(list: Product::class, nullable: true)]
    public ?array $products;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Product|ProductShape>|null $products
     */
    public static function with(
        ?string $msisdn = null,
        ?array $products = null
    ): self {
        $self = new self;

        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $products && $self['products'] = $products;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    /**
     * @param list<Product|ProductShape>|null $products
     */
    public function withProducts(?array $products): self
    {
        $self = clone $this;
        $self['products'] = $products;

        return $self;
    }
}
