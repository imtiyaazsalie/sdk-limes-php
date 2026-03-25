<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\CreateCreateContactParams;

use SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption\Option;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OptionShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\PropertyOption\Option
 *
 * @phpstan-type PropertyOptionShape = array{
 *   id?: string|null,
 *   defaultOption?: string|null,
 *   name?: string|null,
 *   option?: list<Option|OptionShape>|null,
 * }
 */
final class PropertyOption implements BaseModel
{
    /** @use SdkModel<PropertyOptionShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $id;

    #[Optional(nullable: true)]
    public ?string $defaultOption;

    #[Optional(nullable: true)]
    public ?string $name;

    /** @var list<Option>|null $option */
    #[Optional(list: Option::class, nullable: true)]
    public ?array $option;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Option|OptionShape>|null $option
     */
    public static function with(
        ?string $id = null,
        ?string $defaultOption = null,
        ?string $name = null,
        ?array $option = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $defaultOption && $self['defaultOption'] = $defaultOption;
        null !== $name && $self['name'] = $name;
        null !== $option && $self['option'] = $option;

        return $self;
    }

    public function withID(?string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDefaultOption(?string $defaultOption): self
    {
        $self = clone $this;
        $self['defaultOption'] = $defaultOption;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<Option|OptionShape>|null $option
     */
    public function withOption(?array $option): self
    {
        $self = clone $this;
        $self['option'] = $option;

        return $self;
    }
}
