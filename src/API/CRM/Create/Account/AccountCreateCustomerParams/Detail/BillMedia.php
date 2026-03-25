<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail;

use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail\BillMedia\GenerationLevel;
use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail\BillMedia\MediaType;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillMediaShape = array{
 *   emailAddress?: string|null,
 *   generationLevel?: null|GenerationLevel|value-of<GenerationLevel>,
 *   language?: string|null,
 *   mediaType?: null|MediaType|value-of<MediaType>,
 * }
 */
final class BillMedia implements BaseModel
{
    /** @use SdkModel<BillMediaShape> */
    use SdkModel;

    #[Optional(nullable: true)]
    public ?string $emailAddress;

    /** @var value-of<GenerationLevel>|null $generationLevel */
    #[Optional(enum: GenerationLevel::class)]
    public ?string $generationLevel;

    #[Optional(nullable: true)]
    public ?string $language;

    /** @var value-of<MediaType>|null $mediaType */
    #[Optional(enum: MediaType::class)]
    public ?string $mediaType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GenerationLevel|value-of<GenerationLevel>|null $generationLevel
     * @param MediaType|value-of<MediaType>|null $mediaType
     */
    public static function with(
        ?string $emailAddress = null,
        GenerationLevel|string|null $generationLevel = null,
        ?string $language = null,
        MediaType|string|null $mediaType = null,
    ): self {
        $self = new self;

        null !== $emailAddress && $self['emailAddress'] = $emailAddress;
        null !== $generationLevel && $self['generationLevel'] = $generationLevel;
        null !== $language && $self['language'] = $language;
        null !== $mediaType && $self['mediaType'] = $mediaType;

        return $self;
    }

    public function withEmailAddress(?string $emailAddress): self
    {
        $self = clone $this;
        $self['emailAddress'] = $emailAddress;

        return $self;
    }

    /**
     * @param GenerationLevel|value-of<GenerationLevel> $generationLevel
     */
    public function withGenerationLevel(
        GenerationLevel|string $generationLevel
    ): self {
        $self = clone $this;
        $self['generationLevel'] = $generationLevel;

        return $self;
    }

    public function withLanguage(?string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * @param MediaType|value-of<MediaType> $mediaType
     */
    public function withMediaType(MediaType|string $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }
}
