<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrganizationShape = array{
 *   department?: string|null,
 *   name?: string|null,
 *   office?: string|null,
 *   position?: string|null,
 * }
 */
final class Organization implements BaseModel
{
    /** @use SdkModel<OrganizationShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $department;

    #[Optional(nullable: true)]
    public ?string $name;

    #[Optional(nullable: true)]
    public ?string $office;

    #[Optional(nullable: true)]
    public ?string $position;

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
        ?string $department = null,
        ?string $name = null,
        ?string $office = null,
        ?string $position = null,
    ): self {
        $self = new self;

        null !== $department && $self['department'] = $department;
        null !== $name && $self['name'] = $name;
        null !== $office && $self['office'] = $office;
        null !== $position && $self['position'] = $position;

        return $self;
    }

    public function withDepartment(?string $department): self
    {
        $self = clone $this;
        $self['department'] = $department;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOffice(?string $office): self
    {
        $self = clone $this;
        $self['office'] = $office;

        return $self;
    }

    public function withPosition(?string $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

        return $self;
    }
}
