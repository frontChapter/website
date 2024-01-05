<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The SexEnum enum.
 *
 * @method static self WOMAN()
 * @method static self MAN()
 * @method static self OTHER()
 */
class SexEnum extends Enum
{
    const WOMAN = 'woman';
    const MAN = 'man';
    const OTHER = 'other';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function map() : array
    {
        return [
            static::WOMAN => 'Woman',
            static::MAN => 'Man',
            static::OTHER => 'Other',
        ];
    }
}
