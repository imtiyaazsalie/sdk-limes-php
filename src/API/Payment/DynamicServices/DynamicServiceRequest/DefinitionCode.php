<?php

declare(strict_types=1);

namespace SDKLimes\API\Payment\DynamicServices\DynamicServiceRequest;

enum DefinitionCode: string
{
    case VOICE = 'VOICE';

    case DATA = 'DATA';

    case SMS = 'SMS';

    case WHATSAPP = 'WHATSAPP';

    case GPA_CREDIT = 'GPA_CREDIT';
}
