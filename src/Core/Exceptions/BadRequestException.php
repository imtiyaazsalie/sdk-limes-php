<?php

namespace SDKLimes\Core\Exceptions;

class BadRequestException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Bad Request Exception';
}
