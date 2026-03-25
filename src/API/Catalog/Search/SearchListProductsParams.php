<?php

declare(strict_types=1);

namespace SDKLimes\API\Catalog\Search;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Catalog\SearchService::listProducts()
 *
 * @phpstan-type SearchListProductsParamsShape = array{
 *   id?: string|null, adhoc?: string|null, limit?: int|null, page?: int|null
 * }
 */
final class SearchListProductsParams implements BaseModel
{
    /** @use SdkModel<SearchListProductsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $adhoc;

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
        ?string $id = null,
        ?string $adhoc = null,
        ?int $limit = null,
        ?int $page = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $adhoc && $self['adhoc'] = $adhoc;
        null !== $limit && $self['limit'] = $limit;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAdhoc(string $adhoc): self
    {
        $self = clone $this;
        $self['adhoc'] = $adhoc;

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
