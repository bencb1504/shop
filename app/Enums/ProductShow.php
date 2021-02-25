<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductShow extends Enum
{
    const HIDDEN = 0;
    const SHOW = 1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::HIDDEN:
                return 'hidden';
                break;
            case self::SHOW:
                return 'show';
                break;
            default:break;
        }

        return parent::getDescription($value);
    }
}
