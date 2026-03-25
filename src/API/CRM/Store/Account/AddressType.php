<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account;

enum AddressType: string
{
    case POSTAL = 'POSTAL';

    case BILLING = 'BILLING';

    case CORRESPONDENCE = 'CORRESPONDENCE';

    case REGISTERED = 'REGISTERED';

    case INSTALLATION = 'INSTALLATION';
}
