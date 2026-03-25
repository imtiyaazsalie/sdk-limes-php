<?php

namespace SDKLimes\Core\Exceptions;

class PermissionDeniedException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Permission Denied Exception';
}
