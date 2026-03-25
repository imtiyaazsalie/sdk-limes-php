<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\Paystack;

use SDKLimes\Core\Attributes\Required;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Payment\PaystackService::linkTransactionToServices()
 *
 * @phpstan-type PaystackLinkTransactionToServicesParamsShape = array{
 *   serviceIDs: list<string>, transactionReference: string
 * }
 */
final class PaystackLinkTransactionToServicesParams implements BaseModel
{
    /** @use SdkModel<PaystackLinkTransactionToServicesParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $serviceIDs */
    #[Required('serviceIds', list: 'string')]
    public array $serviceIDs;

    #[Required]
    public string $transactionReference;

    /**
     * `new PaystackLinkTransactionToServicesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaystackLinkTransactionToServicesParams::with(
     *   serviceIDs: ..., transactionReference: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaystackLinkTransactionToServicesParams)
     *   ->withServiceIDs(...)
     *   ->withTransactionReference(...)
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
     * @param list<string> $serviceIDs
     */
    public static function with(
        array $serviceIDs,
        string $transactionReference
    ): self {
        $self = new self;

        $self['serviceIDs'] = $serviceIDs;
        $self['transactionReference'] = $transactionReference;

        return $self;
    }

    /**
     * @param list<string> $serviceIDs
     */
    public function withServiceIDs(array $serviceIDs): self
    {
        $self = clone $this;
        $self['serviceIDs'] = $serviceIDs;

        return $self;
    }

    public function withTransactionReference(string $transactionReference): self
    {
        $self = clone $this;
        $self['transactionReference'] = $transactionReference;

        return $self;
    }
}
