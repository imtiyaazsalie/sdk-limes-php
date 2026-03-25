<?php

declare(strict_types=1);

namespace SDKLimes\Core\Conversion;

use SDKLimes\Core\Conversion\Concerns\ArrayOf;
use SDKLimes\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
