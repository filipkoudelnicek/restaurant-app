<?php

namespace App\Enums;

enum TableLocation: string{
    case Vpředu = 'front';
    case Vevnitř = 'inside';
    case Venku = 'outside';
}
