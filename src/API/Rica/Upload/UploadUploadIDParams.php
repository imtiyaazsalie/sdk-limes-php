<?php

declare(strict_types=1);

namespace SDKLimes\API\Rica\Upload;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;

/**
 * @see SDKLimes\Services\API\Rica\UploadService::uploadID()
 *
 * @phpstan-type UploadUploadIDParamsShape = array{file?: string|null}
 */
final class UploadUploadIDParams implements BaseModel
{
    /** @use SdkModel<UploadUploadIDParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $file;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $file = null): self
    {
        $self = new self;

        null !== $file && $self['file'] = $file;

        return $self;
    }

    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}
