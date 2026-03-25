<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\SubscriberService::search()
 *
 * @phpstan-type SubscriberSearchParamsShape = array{
 *   accountID?: string|null,
 *   active?: string|null,
 *   addressID?: string|null,
 *   catalogProductID?: string|null,
 *   completeOrder?: string|null,
 *   customerID?: string|null,
 *   iccid?: string|null,
 *   id?: string|null,
 *   isVisible?: string|null,
 *   limit?: int|null,
 *   msisdn?: string|null,
 *   ocsid?: string|null,
 *   orderID?: string|null,
 *   orderState?: string|null,
 *   page?: int|null,
 *   productType?: string|null,
 *   serviceType?: string|null,
 *   state?: string|null,
 *   status?: string|null,
 *   waybill?: string|null,
 * }
 */
final class SubscriberSearchParams implements BaseModel
{
    /** @use SdkModel<SubscriberSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $accountID;

    #[Optional]
    public ?string $active;

    #[Optional]
    public ?string $addressID;

    #[Optional]
    public ?string $catalogProductID;

    #[Optional]
    public ?string $completeOrder;

    #[Optional]
    public ?string $customerID;

    #[Optional]
    public ?string $iccid;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $isVisible;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $msisdn;

    #[Optional]
    public ?string $ocsid;

    #[Optional]
    public ?string $orderID;

    #[Optional]
    public ?string $orderState;

    #[Optional]
    public ?int $page;

    #[Optional]
    public ?string $productType;

    #[Optional]
    public ?string $serviceType;

    #[Optional]
    public ?string $state;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $waybill;

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
        ?string $accountID = null,
        ?string $active = null,
        ?string $addressID = null,
        ?string $catalogProductID = null,
        ?string $completeOrder = null,
        ?string $customerID = null,
        ?string $iccid = null,
        ?string $id = null,
        ?string $isVisible = null,
        ?int $limit = null,
        ?string $msisdn = null,
        ?string $ocsid = null,
        ?string $orderID = null,
        ?string $orderState = null,
        ?int $page = null,
        ?string $productType = null,
        ?string $serviceType = null,
        ?string $state = null,
        ?string $status = null,
        ?string $waybill = null,
    ): self {
        $self = new self;

        null !== $accountID && $self['accountID'] = $accountID;
        null !== $active && $self['active'] = $active;
        null !== $addressID && $self['addressID'] = $addressID;
        null !== $catalogProductID && $self['catalogProductID'] = $catalogProductID;
        null !== $completeOrder && $self['completeOrder'] = $completeOrder;
        null !== $customerID && $self['customerID'] = $customerID;
        null !== $iccid && $self['iccid'] = $iccid;
        null !== $id && $self['id'] = $id;
        null !== $isVisible && $self['isVisible'] = $isVisible;
        null !== $limit && $self['limit'] = $limit;
        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $ocsid && $self['ocsid'] = $ocsid;
        null !== $orderID && $self['orderID'] = $orderID;
        null !== $orderState && $self['orderState'] = $orderState;
        null !== $page && $self['page'] = $page;
        null !== $productType && $self['productType'] = $productType;
        null !== $serviceType && $self['serviceType'] = $serviceType;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $waybill && $self['waybill'] = $waybill;

        return $self;
    }

    public function withAccountID(string $accountID): self
    {
        $self = clone $this;
        $self['accountID'] = $accountID;

        return $self;
    }

    public function withActive(string $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withAddressID(string $addressID): self
    {
        $self = clone $this;
        $self['addressID'] = $addressID;

        return $self;
    }

    public function withCatalogProductID(string $catalogProductID): self
    {
        $self = clone $this;
        $self['catalogProductID'] = $catalogProductID;

        return $self;
    }

    public function withCompleteOrder(string $completeOrder): self
    {
        $self = clone $this;
        $self['completeOrder'] = $completeOrder;

        return $self;
    }

    public function withCustomerID(string $customerID): self
    {
        $self = clone $this;
        $self['customerID'] = $customerID;

        return $self;
    }

    public function withIccid(string $iccid): self
    {
        $self = clone $this;
        $self['iccid'] = $iccid;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIsVisible(string $isVisible): self
    {
        $self = clone $this;
        $self['isVisible'] = $isVisible;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withMsisdn(string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withOcsid(string $ocsid): self
    {
        $self = clone $this;
        $self['ocsid'] = $ocsid;

        return $self;
    }

    public function withOrderID(string $orderID): self
    {
        $self = clone $this;
        $self['orderID'] = $orderID;

        return $self;
    }

    public function withOrderState(string $orderState): self
    {
        $self = clone $this;
        $self['orderState'] = $orderState;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    public function withProductType(string $productType): self
    {
        $self = clone $this;
        $self['productType'] = $productType;

        return $self;
    }

    public function withServiceType(string $serviceType): self
    {
        $self = clone $this;
        $self['serviceType'] = $serviceType;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withWaybill(string $waybill): self
    {
        $self = clone $this;
        $self['waybill'] = $waybill;

        return $self;
    }
}
