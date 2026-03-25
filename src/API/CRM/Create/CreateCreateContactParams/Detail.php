<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\CreateCreateContactParams;

use SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail\Gender;
use SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail\Organization;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OrganizationShape from \SDKLimes\API\CRM\Create\CreateCreateContactParams\Detail\Organization
 *
 * @phpstan-type DetailShape = array{
 *   additionalInfo?: list<string>|null,
 *   birthDate?: \DateTimeInterface|null,
 *   firstname?: string|null,
 *   gdprConsent?: bool|null,
 *   gender?: null|Gender|value-of<Gender>,
 *   idNumber?: string|null,
 *   lastname?: string|null,
 *   middlename?: string|null,
 *   organization?: null|Organization|OrganizationShape,
 *   password?: string|null,
 *   title?: string|null,
 * }
 */
final class Detail implements BaseModel
{
    /** @use SdkModel<DetailShape> */
    use SdkModel;

    /** @var list<string>|null $additionalInfo */
    #[Optional(list: 'string', nullable: true)]
    public ?array $additionalInfo;

    #[Optional]
    public ?\DateTimeInterface $birthDate;

    #[Optional(nullable: true)]
    public ?string $firstname;

    #[Optional]
    public ?bool $gdprConsent;

    /** @var value-of<Gender>|null $gender */
    #[Optional(enum: Gender::class)]
    public ?string $gender;

    #[Optional(nullable: true)]
    public ?string $idNumber;

    #[Optional(nullable: true)]
    public ?string $lastname;

    #[Optional(nullable: true)]
    public ?string $middlename;

    #[Optional]
    public ?Organization $organization;

    #[Optional(nullable: true)]
    public ?string $password;

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
     *
     * @param list<string>|null $additionalInfo
     * @param Gender|value-of<Gender>|null $gender
     * @param Organization|OrganizationShape|null $organization
     */
    public static function with(
        ?array $additionalInfo = null,
        ?\DateTimeInterface $birthDate = null,
        ?string $firstname = null,
        ?bool $gdprConsent = null,
        Gender|string|null $gender = null,
        ?string $idNumber = null,
        ?string $lastname = null,
        ?string $middlename = null,
        Organization|array|null $organization = null,
        ?string $password = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $additionalInfo && $self['additionalInfo'] = $additionalInfo;
        null !== $birthDate && $self['birthDate'] = $birthDate;
        null !== $firstname && $self['firstname'] = $firstname;
        null !== $gdprConsent && $self['gdprConsent'] = $gdprConsent;
        null !== $gender && $self['gender'] = $gender;
        null !== $idNumber && $self['idNumber'] = $idNumber;
        null !== $lastname && $self['lastname'] = $lastname;
        null !== $middlename && $self['middlename'] = $middlename;
        null !== $organization && $self['organization'] = $organization;
        null !== $password && $self['password'] = $password;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * @param list<string>|null $additionalInfo
     */
    public function withAdditionalInfo(?array $additionalInfo): self
    {
        $self = clone $this;
        $self['additionalInfo'] = $additionalInfo;

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

    /**
     * @param Gender|value-of<Gender> $gender
     */
    public function withGender(Gender|string $gender): self
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

    public function withMiddlename(?string $middlename): self
    {
        $self = clone $this;
        $self['middlename'] = $middlename;

        return $self;
    }

    /**
     * @param Organization|OrganizationShape $organization
     */
    public function withOrganization(Organization|array $organization): self
    {
        $self = clone $this;
        $self['organization'] = $organization;

        return $self;
    }

    public function withPassword(?string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    public function withTitle(?string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
