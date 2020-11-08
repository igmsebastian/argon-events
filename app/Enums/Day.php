<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SUNDAY()
 * @method static static MONDAY()
 * @method static static TUESDAY()
 * @method static static WEDNESDAY()
 * @method static static THURSDAY()
 * @method static static FRIDAY()
 * @method static static SATURDAY()
 */
final class Day extends Enum
{
    const SUNDAY = 'sunday';
    const MONDAY = 'monday';
    const TUESDAY = 'tuesday';
    const WEDNESDAY = 'wednesday';
    const THURSDAY = 'thursday';
    const FRIDAY = 'friday';
    const SATURDAY =  'saturday';
}
