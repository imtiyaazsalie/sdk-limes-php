<?php

declare(strict_types=1);

namespace SDKLimes\API\Mvnx\MvnxCreateWebhookParams;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   iccid?: string|null,
 *   message?: string|null,
 *   msisdn?: string|null,
 *   ocsid?: string|null,
 *   portID?: string|null,
 *   portMsisdn?: string|null,
 *   status?: string|null,
 *   statusName?: string|null,
 *   subscriberID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $iccid;

    #[Optional(nullable: true)]
    public ?string $message;

    #[Optional(nullable: true)]
    public ?string $msisdn;

    #[Optional(nullable: true)]
    public ?string $ocsid;

    #[Optional('portId', nullable: true)]
    public ?string $portID;

    #[Optional(nullable: true)]
    public ?string $portMsisdn;

    #[Optional(nullable: true)]
    public ?string $status;

    #[Optional(nullable: true)]
    public ?string $statusName;

    #[Optional('subscriberId', nullable: true)]
    public ?string $subscriberID;

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
        ?string $iccid = null,
        ?string $message = null,
        ?string $msisdn = null,
        ?string $ocsid = null,
        ?string $portID = null,
        ?string $portMsisdn = null,
        ?string $status = null,
        ?string $statusName = null,
        ?string $subscriberID = null,
    ): self {
        $self = new self;

        null !== $iccid && $self['iccid'] = $iccid;
        null !== $message && $self['message'] = $message;
        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $ocsid && $self['ocsid'] = $ocsid;
        null !== $portID && $self['portID'] = $portID;
        null !== $portMsisdn && $self['portMsisdn'] = $portMsisdn;
        null !== $status && $self['status'] = $status;
        null !== $statusName && $self['statusName'] = $statusName;
        null !== $subscriberID && $self['subscriberID'] = $subscriberID;

        return $self;
    }

    public function withIccid(?string $iccid): self
    {
        $self = clone $this;
        $self['iccid'] = $iccid;

        return $self;
    }

    public function withMessage(?string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withOcsid(?string $ocsid): self
    {
        $self = clone $this;
        $self['ocsid'] = $ocsid;

        return $self;
    }

    public function withPortID(?string $portID): self
    {
        $self = clone $this;
        $self['portID'] = $portID;

        return $self;
    }

    public function withPortMsisdn(?string $portMsisdn): self
    {
        $self = clone $this;
        $self['portMsisdn'] = $portMsisdn;

        return $self;
    }

    public function withStatus(?string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withStatusName(?string $statusName): self
    {
        $self = clone $this;
        $self['statusName'] = $statusName;

        return $self;
    }

    public function withSubscriberID(?string $subscriberID): self
    {
        $self = clone $this;
        $self['subscriberID'] = $subscriberID;

        return $self;
    }
}
