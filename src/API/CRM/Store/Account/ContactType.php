<?php

declare(strict_types=1);

namespace SDKLimes\API\CRM\Store\Account;

enum ContactType: string
{
    case MOBILE_NO = 'MOBILE_NO';

    case HOME_NO = 'HOME_NO';

    case BUSINESS = 'BUSINESS';

    case FAX_NO = 'FAX_NO';
}
