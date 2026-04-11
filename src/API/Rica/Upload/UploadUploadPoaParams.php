<?php

declare(strict_types=1);

namespace SDKLimes\API\Rica\Upload;

use SDKLimes\Core\Attributes\Optional;
use SDKLimes\Core\Concerns\SdkModel;
use SDKLimes\Core\Concerns\SdkParams;
use SDKLimes\Core\Contracts\BaseModel;
use SDKLimes\Core\FileParam;

/**
 * @see SDKLimes\Services\API\Rica\UploadService::uploadPoa()
 *
 * @phpstan-type UploadUploadPoaParamsShape = array{file?: string|null|FileParam}
 */
final class UploadUploadPoaParams implements BaseModel
{
    /** @use SdkModel<UploadUploadPoaParamsShape> */
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
    public static function with(string|FileParam|null $file = null): self
    {
        $self = new self;

        null !== $file && $self['file'] = $file;

        return $self;
    }

    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}
