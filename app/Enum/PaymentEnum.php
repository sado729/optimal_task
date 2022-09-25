<?php

namespace App\Enum;

enum PaymentEnum:string
{
    case ACCOUNT = 'Account';
    case PO = 'P.O.';
    case COD = 'C.O.D.';
    case WARRANTY = 'Warranty';
    case CREDIT = 'Credit';

    public function label(): string {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string {
        return match ($value) {
            self::ACCOUNT => 'Account',
            self::PO => 'P.O.',
            self::COD => 'C.O.D.',
            self::WARRANTY => 'Warranty',
            self::CREDIT => 'Credit',
        };
    }
}
