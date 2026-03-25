<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account;

use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\CollectionPlan;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Contact;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Phone;
use SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\TaxScheme;
use SDKLimes\API\CRM\Update\AccountCustomer;
use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\CRM\Store\AccountService::createCustomer()
 *
 * @phpstan-import-type AccountAddressShape from \SDKLimes\API\CRM\Store\Account\AccountAddress
 * @phpstan-import-type CollectionPlanShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\CollectionPlan
 * @phpstan-import-type ContactShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Contact
 * @phpstan-import-type AccountCustomerShape from \SDKLimes\API\CRM\Update\AccountCustomer
 * @phpstan-import-type DetailShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail
 * @phpstan-import-type PhoneShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Phone
 * @phpstan-import-type TaxSchemeShape from \SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\TaxScheme
 *
 * @phpstan-type AccountCreateCustomerParamsShape = array{
 *   address?: list<AccountAddress|AccountAddressShape>|null,
 *   collectionPlan?: null|CollectionPlan|CollectionPlanShape,
 *   contact?: null|Contact|ContactShape,
 *   customer?: null|AccountCustomer|AccountCustomerShape,
 *   detail?: null|Detail|DetailShape,
 *   isResidential?: bool|null,
 *   phone?: null|Phone|PhoneShape,
 *   taxScheme?: null|TaxScheme|TaxSchemeShape,
 * }
 */
final class AccountCreateCustomerParams implements BaseModel
{
    /** @use SdkModel<AccountCreateCustomerParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<AccountAddress>|null $address */
    #[Optional(list: AccountAddress::class, nullable: true)]
    public ?array $address;

    #[Optional]
    public ?CollectionPlan $collectionPlan;

    #[Optional]
    public ?Contact $contact;

    #[Optional]
    public ?AccountCustomer $customer;

    #[Optional]
    public ?Detail $detail;

    #[Optional]
    public ?bool $isResidential;

    #[Optional]
    public ?Phone $phone;

    #[Optional]
    public ?TaxScheme $taxScheme;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AccountAddress|AccountAddressShape>|null $address
     * @param CollectionPlan|CollectionPlanShape|null $collectionPlan
     * @param Contact|ContactShape|null $contact
     * @param AccountCustomer|AccountCustomerShape|null $customer
     * @param Detail|DetailShape|null $detail
     * @param Phone|PhoneShape|null $phone
     * @param TaxScheme|TaxSchemeShape|null $taxScheme
     */
    public static function with(
        ?array $address = null,
        CollectionPlan|array|null $collectionPlan = null,
        Contact|array|null $contact = null,
        AccountCustomer|array|null $customer = null,
        Detail|array|null $detail = null,
        ?bool $isResidential = null,
        Phone|array|null $phone = null,
        TaxScheme|array|null $taxScheme = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        null !== $collectionPlan && $self['collectionPlan'] = $collectionPlan;
        null !== $contact && $self['contact'] = $contact;
        null !== $customer && $self['customer'] = $customer;
        null !== $detail && $self['detail'] = $detail;
        null !== $isResidential && $self['isResidential'] = $isResidential;
        null !== $phone && $self['phone'] = $phone;
        null !== $taxScheme && $self['taxScheme'] = $taxScheme;

        return $self;
    }

    /**
     * @param list<AccountAddress|AccountAddressShape>|null $address
     */
    public function withAddress(?array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * @param CollectionPlan|CollectionPlanShape $collectionPlan
     */
    public function withCollectionPlan(
        CollectionPlan|array $collectionPlan
    ): self {
        $self = clone $this;
        $self['collectionPlan'] = $collectionPlan;

        return $self;
    }

    /**
     * @param Contact|ContactShape $contact
     */
    public function withContact(Contact|array $contact): self
    {
        $self = clone $this;
        $self['contact'] = $contact;

        return $self;
    }

    /**
     * @param AccountCustomer|AccountCustomerShape $customer
     */
    public function withCustomer(AccountCustomer|array $customer): self
    {
        $self = clone $this;
        $self['customer'] = $customer;

        return $self;
    }

    /**
     * @param Detail|DetailShape $detail
     */
    public function withDetail(Detail|array $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    public function withIsResidential(bool $isResidential): self
    {
        $self = clone $this;
        $self['isResidential'] = $isResidential;

        return $self;
    }

    /**
     * @param Phone|PhoneShape $phone
     */
    public function withPhone(Phone|array $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    /**
     * @param TaxScheme|TaxSchemeShape $taxScheme
     */
    public function withTaxScheme(TaxScheme|array $taxScheme): self
    {
        $self = clone $this;
        $self['taxScheme'] = $taxScheme;

        return $self;
    }
}
