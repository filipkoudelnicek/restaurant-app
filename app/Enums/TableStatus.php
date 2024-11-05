<?php

namespace App\Enums;

enum TableStatus: string{
    case Vyřizování = 'pending';
    case Volný = 'avaliable';
    case Nedostupný = 'unavaliable';
}
