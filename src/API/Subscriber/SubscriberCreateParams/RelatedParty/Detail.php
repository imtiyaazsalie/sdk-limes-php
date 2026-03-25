<?php

declare(strict_types=1);

namespace SDKLimes\API\Subscriber\SubscriberCreateParams\RelatedParty;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-type DetailShape = array{
 *   birthDate?: \DateTimeInterface|null,
 *   firstname?: string|null,
 *   gdprConsent?: bool|null,
 *   gender?: string|null,
 *   idNumber?: string|null,
 *   lastname?: string|null,
 *   title?: string|null,
 * }
 */
final class Detail implements BaseModel
{
    /** @use SdkModel<DetailShape> */
    use SdkModel;

    #[Optional]
    public ?\DateTimeInterface $birthDate;

    #[Optional(nullable: true)]
    public ?string $firstname;

    #[Optional]
    public ?bool $gdprConsent;

    #[Optional(nullable: true)]
    public ?string $gender;

    #[Optional(nullable: true)]
    public ?string $idNumber;

    #[Optional(nullable: true)]
    public ?string $lastname;

    #[Optional(nullable: true)]
    public ?string $title;

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
        ?\DateTimeInterface $birthDate = null,
        ?string $firstname = null,
        ?bool $gdprConsent = null,
        ?string $gender = null,
        ?string $idNumber = null,
        ?string $lastname = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $birthDate && $self['birthDate'] = $birthDate;
        null !== $firstname && $self['firstname'] = $firstname;
        null !== $gdprConsent && $self['gdprConsent'] = $gdprConsent;
        null !== $gender && $self['gender'] = $gender;
        null !== $idNumber && $self['idNumber'] = $idNumber;
        null !== $lastname && $self['lastname'] = $lastname;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withBirthDate(\DateTimeInterface $birthDate): self
    {
        $self = clone $this;
        $self['birthDate'] = $birthDate;

        return $self;
    }

    public function withFirstname(?string $firstname): self
    {
        $self = clone $this;
        $self['firstname'] = $firstname;

        return $self;
    }

    public function withGdprConsent(bool $gdprConsent): self
    {
        $self = clone $this;
        $self['gdprConsent'] = $gdprConsent;

        return $self;
    }

    public function withGender(?string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    public function withIDNumber(?string $idNumber): self
    {
        $self = clone $this;
        $self['idNumber'] = $idNumber;

        return $self;
    }

    public function withLastname(?string $lastname): self
    {
        $self = clone $this;
        $self['lastname'] = $lastname;

        return $self;
    }

    public function withTitle(?string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
