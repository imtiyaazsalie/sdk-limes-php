<?php

declare(strict_types=1);

namespace SDKLimes\API\Mvnx;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\MvnxService::createPort()
 *
 * @phpstan-type MvnxCreatePortParamsShape = array{
 *   newMsisdn: string,
 *   oldMsisdn: string,
 *   portedAt?: \DateTimeInterface|null,
 *   reference?: string|null,
 * }
 */
final class MvnxCreatePortParams implements BaseModel
{
    /** @use SdkModel<MvnxCreatePortParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $newMsisdn;

    #[Required]
    public string $oldMsisdn;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $portedAt;

    #[Optional(nullable: true)]
    public ?string $reference;

    /**
     * `new MvnxCreatePortParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MvnxCreatePortParams::with(newMsisdn: ..., oldMsisdn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MvnxCreatePortParams)->withNewMsisdn(...)->withOldMsisdn(...)
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
    public static function with(
        string $newMsisdn,
        string $oldMsisdn,
        ?\DateTimeInterface $portedAt = null,
        ?string $reference = null,
    ): self {
        $self = new self;

        $self['newMsisdn'] = $newMsisdn;
        $self['oldMsisdn'] = $oldMsisdn;

        null !== $portedAt && $self['portedAt'] = $portedAt;
        null !== $reference && $self['reference'] = $reference;

        return $self;
    }

    public function withNewMsisdn(string $newMsisdn): self
    {
        $self = clone $this;
        $self['newMsisdn'] = $newMsisdn;

        return $self;
    }

    public function withOldMsisdn(string $oldMsisdn): self
    {
        $self = clone $this;
        $self['oldMsisdn'] = $oldMsisdn;

        return $self;
    }

    public function withPortedAt(?\DateTimeInterface $portedAt): self
    {
        $self = clone $this;
        $self['portedAt'] = $portedAt;

        return $self;
    }

    public function withReference(?string $reference): self
    {
        $self = clone $this;
        $self['reference'] = $reference;

        return $self;
    }
}
