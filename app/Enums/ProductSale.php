<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductSale extends Enum
{
    const NOT = 0;
    const SALE = 1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::NOT:
                return 'Not sale';
                break;
            case self::SALE:
                return 'Sale';
                break;
            default:break;
        }

        return parent::getDescription($value);
    }
}
