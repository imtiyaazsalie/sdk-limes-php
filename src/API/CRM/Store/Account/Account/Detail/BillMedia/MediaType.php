<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account\Account\Detail\BillMedia;

enum MediaType: string
{
    case SMS = 'SMS';

    case EMAIL = 'EMAIL';
}
