<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type TaxSchemeShape = array{id?: string|null}
 */
final class TaxScheme implements BaseModel
{
    /** @use SdkModel<TaxSchemeShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;

        return $self;
    }

    public function withID(?string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
