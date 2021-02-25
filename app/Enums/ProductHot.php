<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductHot extends Enum
{
    const NOT = 0;
    const HOT = 1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::NOT:
                return 'Not hot';
                break;
            case self::HOT:
                return 'HOT';
                break;
            default:break;
        }

        return parent::getDescription($value);
    }
}
