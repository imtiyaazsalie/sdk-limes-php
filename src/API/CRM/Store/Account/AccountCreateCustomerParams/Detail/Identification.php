<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail;

use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail\Identification\IDType;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type IdentificationShape = array{
 *   idNumber?: string|null, idType?: null|IDType|value-of<IDType>
 * }
 */
final class Identification implements BaseModel
{
    /** @use SdkModel<IdentificationShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $idNumber;

    /** @var value-of<IDType>|null $idType */
    #[Optional(enum: IDType::class)]
    public ?string $idType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IDType|value-of<IDType>|null $idType
     */
    public static function with(
        ?string $idNumber = null,
        IDType|string|null $idType = null
    ): self {
        $self = new self;

        null !== $idNumber && $self['idNumber'] = $idNumber;
        null !== $idType && $self['idType'] = $idType;

        return $self;
    }

    public function withIDNumber(?string $idNumber): self
    {
        $self = clone $this;
        $self['idNumber'] = $idNumber;

        return $self;
    }

    /**
     * @param IDType|value-of<IDType> $idType
     */
    public function withIDType(IDType|string $idType): self
    {
        $self = clone $this;
        $self['idType'] = $idType;

        return $self;
    }
}
