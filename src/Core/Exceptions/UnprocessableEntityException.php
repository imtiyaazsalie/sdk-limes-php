<?php

namespace SDKLimes\Core\Exceptions;

class UnprocessableEntityException extends APIStatusException
{
    /** @var string */
    protected const DESC = 'SDKLimes Unprocessable Entity Exception';
}
