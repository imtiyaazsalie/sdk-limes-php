<?php

namespace SDKLimes\Core\Exceptions;

class RateLimitException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Rate Limit Exception';
}
