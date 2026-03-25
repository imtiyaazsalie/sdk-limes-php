<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account\AccountCreateCustomerParams\Detail\BillMedia;

enum GenerationLevel: string
{
    case ACCOUNT = 'ACCOUNT';

    case PODEMAND = 'PODEMAND';

    case PURCHORDER = 'PURCHORDER';
}
