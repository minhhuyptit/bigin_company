<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static DEACTIVATED()
 * @method static static ACTIVATED()
 * @method static static PENDING()
 */
final class MemberStatus extends Enum
{
    const DEACTIVATED   = 0;
    const ACTIVATED     = 1;
    const PENDING       = 2;
}
