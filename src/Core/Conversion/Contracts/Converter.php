<?php

declare(strict_types=1);

namespace SDKLimes\Core\Conversion\Contracts;

use SDKLimes\Core\Conversion\CoerceState;
use SDKLimes\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
