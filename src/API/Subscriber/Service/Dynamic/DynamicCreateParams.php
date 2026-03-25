<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber\Service\Dynamic;

use SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Subscriber\Service\DynamicService::create()
 *
 * @phpstan-import-type DynamicServiceRequestShape from \SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest
 *
 * @phpstan-type DynamicCreateParamsShape = array{
 *   services?: list<DynamicServiceRequest|DynamicServiceRequestShape>|null
 * }
 */
final class DynamicCreateParams implements BaseModel
{
    /** @use SdkModel<DynamicCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<DynamicServiceRequest>|null $services */
    #[Optional(list: DynamicServiceRequest::class, nullable: true)]
    public ?array $services;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape>|null $services
     */
    public static function with(?array $services = null): self
    {
        $self = new self;

        null !== $services && $self['services'] = $services;

        return $self;
    }

    /**
     * @param list<DynamicServiceRequest|DynamicServiceRequestShape>|null $services
     */
    public function withServices(?array $services): self
    {
        $self = clone $this;
        $self['services'] = $services;

        return $self;
    }
}
