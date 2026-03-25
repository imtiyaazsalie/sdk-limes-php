<?php

namespace SDKLimes\Core\Exceptions;

class ConflictException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Conflict Exception';
}
