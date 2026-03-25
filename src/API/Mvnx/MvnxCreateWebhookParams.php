<?php

declare(strict_types=1);

namespace SDKLimes\API\Mvnx;

use SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\MvnxService::createWebhook()
 *
 * @phpstan-import-type DataShape from \SDKLimes\API\Mvnx\MvnxCreateWebhookParams\Data
 *
 * @phpstan-type MvnxCreateWebhookParamsShape = array{
 *   id?: string|null,
 *   data?: null|Data|DataShape,
 *   receivedOn?: \DateTimeInterface|null,
 *   sentOn?: \DateTimeInterface|null,
 *   type?: string|null,
 * }
 */
final class MvnxCreateWebhookParams implements BaseModel
{
    /** @use SdkModel<MvnxCreateWebhookParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $id;

    #[Optional]
    public ?Data $data;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $receivedOn;

    #[Optional(nullable: true)]
    public ?\DateTimeInterface $sentOn;

    #[Optional(nullable: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(
        ?string $id = null,
        Data|array|null $data = null,
        ?\DateTimeInterface $receivedOn = null,
        ?\DateTimeInterface $sentOn = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $data && $self['data'] = $data;
        null !== $receivedOn && $self['receivedOn'] = $receivedOn;
        null !== $sentOn && $self['sentOn'] = $sentOn;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(?string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    public function withReceivedOn(?\DateTimeInterface $receivedOn): self
    {
        $self = clone $this;
        $self['receivedOn'] = $receivedOn;

        return $self;
    }

    public function withSentOn(?\DateTimeInterface $sentOn): self
    {
        $self = clone $this;
        $self['sentOn'] = $sentOn;

        return $self;
    }

    public function withType(?string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
