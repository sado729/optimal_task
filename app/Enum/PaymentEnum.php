<?php

namespace App\Enum;

enum PaymentEnum:string
{
    case ACCOUNT = 'Account';
    case PO = 'P.O.';
    case COD = 'C.O.D.';
    case WARRANTY = 'Warranty';
    case CREDIT = 'Credit';
}
