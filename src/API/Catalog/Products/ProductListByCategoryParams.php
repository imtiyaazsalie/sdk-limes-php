<?php

declare(strict_types=1);

namespace SDKLimes\API\Catalog\Products;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Catalog\ProductsService::listByCategory()
 *
 * @phpstan-type ProductListByCategoryParamsShape = array{
 *   descendants?: bool|null, limit?: int|null, page?: int|null
 * }
 */
final class ProductListByCategoryParams implements BaseModel
{
    /** @use SdkModel<ProductListByCategoryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $descendants;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?int $page;

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
        ?bool $descendants = null,
        ?int $limit = null,
        ?int $page = null
    ): self {
        $self = new self;

        null !== $descendants && $self['descendants'] = $descendants;
        null !== $limit && $self['limit'] = $limit;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    public function withDescendants(bool $descendants): self
    {
        $self = clone $this;
        $self['descendants'] = $descendants;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
