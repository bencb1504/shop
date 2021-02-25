<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductSpecial extends Enum
{
    const NOT = 0;
    const SPECIAL = 1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::NOT:
                return 'Not special';
                break;
            case self::SPECIAL:
                return 'Special';
                break;
            default:break;
        }

        return parent::getDescription($value);
    }
}
