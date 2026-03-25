<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\DynamicServices;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\DynamicServicesService::initialize()
 *
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 *
 * @phpstan-type DynamicServiceInitializeParamsShape = array{
 *   services: list<DynamicServiceRequest|DynamicServiceRequestShape>,
 *   msisdn?: string|null,
 *   shippingCostInCents?: int|null,
 * }
 */
final class DynamicServiceInitializeParams implements BaseModel
{
    /** @use SdkModel<DynamicServiceInitializeParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<DynamicServiceRequest> $services */
    #[Required(list: DynamicServiceRequest::class)]
    public array $services;

    #[Optional(nullable: true)]
    public ?string $msisdn;

    #[Optional(nullable: true)]
    public ?int $shippingCostInCents;

    /**
     * `new DynamicServiceInitializeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicServiceInitializeParams::with(services: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DynamicServiceInitializeParams)->withServices(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape> $services
     */
    public static function with(
        array $services,
        ?string $msisdn = null,
        ?int $shippingCostInCents = null
    ): self {
        $self = new self;

        $self['services'] = $services;

        null !== $msisdn && $self['msisdn'] = $msisdn;
        null !== $shippingCostInCents && $self['shippingCostInCents'] = $shippingCostInCents;

        return $self;
    }

    /**
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape> $services
     */
    public function withServices(array $services): self
    {
        $self = clone $this;
        $self['services'] = $services;

        return $self;
    }

    public function withMsisdn(?string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withShippingCostInCents(?int $shippingCostInCents): self
    {
        $self = clone $this;
        $self['shippingCostInCents'] = $shippingCostInCents;

        return $self;
    }
}
