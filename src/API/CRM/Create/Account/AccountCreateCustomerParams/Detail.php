<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams;

use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail\BillMedia;
use SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail\Identification;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BillMediaShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail\BillMedia
 * @phpstan-import-type IdentificationShape from \SDKLimes\API\CRM\Create\Account\AccountCreateCustomerParams\Detail\Identification
 *
 * @phpstan-type DetailShape = array{
 *   billMedia?: null|BillMedia|BillMediaShape,
 *   creditLimit?: float|null,
 *   firstname?: string|null,
 *   hasDeposit?: bool|null,
 *   identification?: null|Identification|IdentificationShape,
 *   lastname?: string|null,
 *   title?: string|null,
 * }
 */
final class Detail implements BaseModel
{
    /** @use SdkModel<DetailShape> */
    use SdkModel;

    #[Optional]
    public ?BillMedia $billMedia;

    #[Optional]
    public ?float $creditLimit;

    #[Optional(nullable: true)]
    public ?string $firstname;

    #[Optional]
    public ?bool $hasDeposit;

    #[Optional]
    public ?Identification $identification;

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
     *
     * @param BillMedia|BillMediaShape|null $billMedia
     * @param Identification|IdentificationShape|null $identification
     */
    public static function with(
        BillMedia|array|null $billMedia = null,
        ?float $creditLimit = null,
        ?string $firstname = null,
        ?bool $hasDeposit = null,
        Identification|array|null $identification = null,
        ?string $lastname = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $billMedia && $self['billMedia'] = $billMedia;
        null !== $creditLimit && $self['creditLimit'] = $creditLimit;
        null !== $firstname && $self['firstname'] = $firstname;
        null !== $hasDeposit && $self['hasDeposit'] = $hasDeposit;
        null !== $identification && $self['identification'] = $identification;
        null !== $lastname && $self['lastname'] = $lastname;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * @param BillMedia|BillMediaShape $billMedia
     */
    public function withBillMedia(BillMedia|array $billMedia): self
    {
        $self = clone $this;
        $self['billMedia'] = $billMedia;

        return $self;
    }

    public function withCreditLimit(float $creditLimit): self
    {
        $self = clone $this;
        $self['creditLimit'] = $creditLimit;

        return $self;
    }

    public function withFirstname(?string $firstname): self
    {
        $self = clone $this;
        $self['firstname'] = $firstname;

        return $self;
    }

    public function withHasDeposit(bool $hasDeposit): self
    {
        $self = clone $this;
        $self['hasDeposit'] = $hasDeposit;

        return $self;
    }

    /**
     * @param Identification|IdentificationShape $identification
     */
    public function withIdentification(
        Identification|array $identification
    ): self {
        $self = clone $this;
        $self['identification'] = $identification;

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
