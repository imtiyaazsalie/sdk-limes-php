<?php

declare(strict_types=1);

namespace SDKLimes\API\Catalog\Category;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Catalog\CategoryService::getTree()
 *
 * @phpstan-type CategoryGetTreeParamsShape = array{
 *   groupCode?: string|null, groupOnly?: bool|null
 * }
 */
final class CategoryGetTreeParams implements BaseModel
{
    /** @use SdkModel<CategoryGetTreeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $groupCode;

    #[Optional]
    public ?bool $groupOnly;

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
        ?string $groupCode = null,
        ?bool $groupOnly = null
    ): self {
        $self = new self;

        null !== $groupCode && $self['groupCode'] = $groupCode;
        null !== $groupOnly && $self['groupOnly'] = $groupOnly;

        return $self;
    }

    public function withGroupCode(string $groupCode): self
    {
        $self = clone $this;
        $self['groupCode'] = $groupCode;

        return $self;
    }

    public function withGroupOnly(bool $groupOnly): self
    {
        $self = clone $this;
        $self['groupOnly'] = $groupOnly;

        return $self;
    }
}
