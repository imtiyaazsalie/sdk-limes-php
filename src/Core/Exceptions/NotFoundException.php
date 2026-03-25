<?php

namespace SDKLimes\Core\Exceptions;

class NotFoundException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Not Found Exception';
}
