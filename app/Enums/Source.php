<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum Source: string
{
    use HasEnumValues;
    case NEWSAPI = 'newsapi';
    case GUARDIAN = 'guardian';
}
