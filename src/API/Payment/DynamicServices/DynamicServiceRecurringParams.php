<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\DynamicServices;

use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\DynamicServicesService::recurring()
 *
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 *
 * @phpstan-type DynamicServiceRecurringParamsShape = array{
 *   msisdn: string,
 *   paymentMethodID: string,
 *   services: list<DynamicServiceRequest|DynamicServiceRequestShape>,
 * }
 */
final class DynamicServiceRecurringParams implements BaseModel
{
    /** @use SdkModel<DynamicServiceRecurringParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $msisdn;

    #[Required('paymentMethodId')]
    public string $paymentMethodID;

    /** @var list<DynamicServiceRequest> $services */
    #[Required(list: DynamicServiceRequest::class)]
    public array $services;

    /**
     * `new DynamicServiceRecurringParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicServiceRecurringParams::with(
     *   msisdn: ..., paymentMethodID: ..., services: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DynamicServiceRecurringParams)
     *   ->withMsisdn(...)
     *   ->withPaymentMethodID(...)
     *   ->withServices(...)
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
        string $msisdn,
        string $paymentMethodID,
        array $services
    ): self {
        $self = new self;

        $self['msisdn'] = $msisdn;
        $self['paymentMethodID'] = $paymentMethodID;
        $self['services'] = $services;

        return $self;
    }

    public function withMsisdn(string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withPaymentMethodID(string $paymentMethodID): self
    {
        $self = clone $this;
        $self['paymentMethodID'] = $paymentMethodID;

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
}
