<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\CreateCreateContactParams;

use SDKLimes\API\CRM\Store\Account\AddressType;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type AddressShape = array{
 *   addressType?: null|AddressType|value-of<AddressType>,
 *   buildingName?: string|null,
 *   buildingNo?: string|null,
 *   city?: string|null,
 *   country?: string|null,
 *   latitude?: string|null,
 *   longitude?: string|null,
 *   oneLineAddress?: string|null,
 *   postCode?: string|null,
 *   referredType?: string|null,
 *   stateOrProvince?: string|null,
 *   streetName?: string|null,
 *   streetNo?: string|null,
 *   suburb?: string|null,
 * }
 */
final class Address implements BaseModel
{
    /** @use SdkModel<AddressShape> */
    use SdkModel;

    /** @var value-of<AddressType>|null $addressType */
    #[Optional(enum: AddressType::class)]
    public ?string $addressType;

    #[Optional(nullable: true)]
    public ?string $buildingName;

    #[Optional(nullable: true)]
    public ?string $buildingNo;

    #[Optional(nullable: true)]
    public ?string $city;

    #[Optional(nullable: true)]
    public ?string $country;

    #[Optional(nullable: true)]
    public ?string $latitude;

    #[Optional(nullable: true)]
    public ?string $longitude;

    #[Optional(nullable: true)]
    public ?string $oneLineAddress;

    #[Optional(nullable: true)]
    public ?string $postCode;

    #[Optional(nullable: true)]
    public ?string $referredType;

    #[Optional(nullable: true)]
    public ?string $stateOrProvince;

    #[Optional(nullable: true)]
    public ?string $streetName;

    #[Optional(nullable: true)]
    public ?string $streetNo;

    #[Optional(nullable: true)]
    public ?string $suburb;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AddressType|value-of<AddressType>|null $addressType
     */
    public static function with(
        AddressType|string|null $addressType = null,
        ?string $buildingName = null,
        ?string $buildingNo = null,
        ?string $city = null,
        ?string $country = null,
        ?string $latitude = null,
        ?string $longitude = null,
        ?string $oneLineAddress = null,
        ?string $postCode = null,
        ?string $referredType = null,
        ?string $stateOrProvince = null,
        ?string $streetName = null,
        ?string $streetNo = null,
        ?string $suburb = null,
    ): self {
        $self = new self;

        null !== $addressType && $self['addressType'] = $addressType;
        null !== $buildingName && $self['buildingName'] = $buildingName;
        null !== $buildingNo && $self['buildingNo'] = $buildingNo;
        null !== $city && $self['city'] = $city;
        null !== $country && $self['country'] = $country;
        null !== $latitude && $self['latitude'] = $latitude;
        null !== $longitude && $self['longitude'] = $longitude;
        null !== $oneLineAddress && $self['oneLineAddress'] = $oneLineAddress;
        null !== $postCode && $self['postCode'] = $postCode;
        null !== $referredType && $self['referredType'] = $referredType;
        null !== $stateOrProvince && $self['stateOrProvince'] = $stateOrProvince;
        null !== $streetName && $self['streetName'] = $streetName;
        null !== $streetNo && $self['streetNo'] = $streetNo;
        null !== $suburb && $self['suburb'] = $suburb;

        return $self;
    }

    /**
     * @param AddressType|value-of<AddressType> $addressType
     */
    public function withAddressType(AddressType|string $addressType): self
    {
        $self = clone $this;
        $self['addressType'] = $addressType;

        return $self;
    }

    public function withBuildingName(?string $buildingName): self
    {
        $self = clone $this;
        $self['buildingName'] = $buildingName;

        return $self;
    }

    public function withBuildingNo(?string $buildingNo): self
    {
        $self = clone $this;
        $self['buildingNo'] = $buildingNo;

        return $self;
    }

    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withLatitude(?string $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLongitude(?string $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    public function withOneLineAddress(?string $oneLineAddress): self
    {
        $self = clone $this;
        $self['oneLineAddress'] = $oneLineAddress;

        return $self;
    }

    public function withPostCode(?string $postCode): self
    {
        $self = clone $this;
        $self['postCode'] = $postCode;

        return $self;
    }

    public function withReferredType(?string $referredType): self
    {
        $self = clone $this;
        $self['referredType'] = $referredType;

        return $self;
    }

    public function withStateOrProvince(?string $stateOrProvince): self
    {
        $self = clone $this;
        $self['stateOrProvince'] = $stateOrProvince;

        return $self;
    }

    public function withStreetName(?string $streetName): self
    {
        $self = clone $this;
        $self['streetName'] = $streetName;

        return $self;
    }

    public function withStreetNo(?string $streetNo): self
    {
        $self = clone $this;
        $self['streetNo'] = $streetNo;

        return $self;
    }

    public function withSuburb(?string $suburb): self
    {
        $self = clone $this;
        $self['suburb'] = $suburb;

        return $self;
    }
}
