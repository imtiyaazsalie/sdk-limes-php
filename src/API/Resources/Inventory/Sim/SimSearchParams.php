<?php

declare(strict_types=1);

namespace SDKLimes\API\Resources\Inventory\Sim;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Resources\Inventory\SimService::search()
 *
 * @phpstan-type SimSearchParamsShape = array{
 *   id?: string|null,
 *   accessNo?: string|null,
 *   dealer?: string|null,
 *   imsi?: string|null,
 *   limit?: int|null,
 *   page?: int|null,
 *   status?: string|null,
 *   subStatus?: string|null,
 * }
 */
final class SimSearchParams implements BaseModel
{
    /** @use SdkModel<SimSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $accessNo;

    #[Optional]
    public ?string $dealer;

    #[Optional]
    public ?string $imsi;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?int $page;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $subStatus;

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
        ?string $id = null,
        ?string $accessNo = null,
        ?string $dealer = null,
        ?string $imsi = null,
        ?int $limit = null,
        ?int $page = null,
        ?string $status = null,
        ?string $subStatus = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $accessNo && $self['accessNo'] = $accessNo;
        null !== $dealer && $self['dealer'] = $dealer;
        null !== $imsi && $self['imsi'] = $imsi;
        null !== $limit && $self['limit'] = $limit;
        null !== $page && $self['page'] = $page;
        null !== $status && $self['status'] = $status;
        null !== $subStatus && $self['subStatus'] = $subStatus;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAccessNo(string $accessNo): self
    {
        $self = clone $this;
        $self['accessNo'] = $accessNo;

        return $self;
    }

    public function withDealer(string $dealer): self
    {
        $self = clone $this;
        $self['dealer'] = $dealer;

        return $self;
    }

    public function withImsi(string $imsi): self
    {
        $self = clone $this;
        $self['imsi'] = $imsi;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubStatus(string $subStatus): self
    {
        $self = clone $this;
        $self['subStatus'] = $subStatus;

        return $self;
    }
}
