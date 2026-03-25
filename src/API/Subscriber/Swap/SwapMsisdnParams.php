<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber\Swap;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Subscriber\SwapService::msisdn()
 *
 * @phpstan-type SwapMsisdnParamsShape = array{msisdn: string, port?: bool|null}
 */
final class SwapMsisdnParams implements BaseModel
{
    /** @use SdkModel<SwapMsisdnParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $msisdn;

    #[Optional]
    public ?bool $port;

    /**
     * `new SwapMsisdnParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SwapMsisdnParams::with(msisdn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SwapMsisdnParams)->withMsisdn(...)
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
     */
    public static function with(string $msisdn, ?bool $port = null): self
    {
        $self = new self;

        $self['msisdn'] = $msisdn;

        null !== $port && $self['port'] = $port;

        return $self;
    }

    public function withMsisdn(string $msisdn): self
    {
        $self = clone $this;
        $self['msisdn'] = $msisdn;

        return $self;
    }

    public function withPort(bool $port): self
    {
        $self = clone $this;
        $self['port'] = $port;

        return $self;
    }
}
