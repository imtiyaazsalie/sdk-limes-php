<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Search;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\CRM\SearchService::listAccounts()
 *
 * @phpstan-type SearchListAccountsParamsShape = array{
 *   bCycle?: string|null,
 *   category?: string|null,
 *   class?: string|null,
 *   fName?: string|null,
 *   id?: string|null,
 *   idNum?: string|null,
 *   idType?: string|null,
 *   limit?: int|null,
 *   lName?: string|null,
 *   name?: string|null,
 *   page?: int|null,
 *   relID?: string|null,
 *   state?: string|null,
 *   type?: string|null,
 * }
 */
final class SearchListAccountsParams implements BaseModel
{
    /** @use SdkModel<SearchListAccountsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $bCycle;

    #[Optional]
    public ?string $category;

    #[Optional]
    public ?string $class;

    #[Optional]
    public ?string $fName;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $idNum;

    #[Optional]
    public ?string $idType;

    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $lName;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?int $page;

    #[Optional]
    public ?string $relID;

    #[Optional]
    public ?string $state;

    #[Optional]
    public ?string $type;

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
        ?string $bCycle = null,
        ?string $category = null,
        ?string $class = null,
        ?string $fName = null,
        ?string $id = null,
        ?string $idNum = null,
        ?string $idType = null,
        ?int $limit = null,
        ?string $lName = null,
        ?string $name = null,
        ?int $page = null,
        ?string $relID = null,
        ?string $state = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $bCycle && $self['bCycle'] = $bCycle;
        null !== $category && $self['category'] = $category;
        null !== $class && $self['class'] = $class;
        null !== $fName && $self['fName'] = $fName;
        null !== $id && $self['id'] = $id;
        null !== $idNum && $self['idNum'] = $idNum;
        null !== $idType && $self['idType'] = $idType;
        null !== $limit && $self['limit'] = $limit;
        null !== $lName && $self['lName'] = $lName;
        null !== $name && $self['name'] = $name;
        null !== $page && $self['page'] = $page;
        null !== $relID && $self['relID'] = $relID;
        null !== $state && $self['state'] = $state;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withBCycle(string $bCycle): self
    {
        $self = clone $this;
        $self['bCycle'] = $bCycle;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withClass(string $class): self
    {
        $self = clone $this;
        $self['class'] = $class;

        return $self;
    }

    public function withFName(string $fName): self
    {
        $self = clone $this;
        $self['fName'] = $fName;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withIDNum(string $idNum): self
    {
        $self = clone $this;
        $self['idNum'] = $idNum;

        return $self;
    }

    public function withIDType(string $idType): self
    {
        $self = clone $this;
        $self['idType'] = $idType;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withLName(string $lName): self
    {
        $self = clone $this;
        $self['lName'] = $lName;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    public function withRelID(string $relID): self
    {
        $self = clone $this;
        $self['relID'] = $relID;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
