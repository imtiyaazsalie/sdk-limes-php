<?php

namespace SDKLimes\Core\Exceptions;

class InternalServerException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Internal Server Exception';
}
