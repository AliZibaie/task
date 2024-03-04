<?php

namespace App\Traits;

use phpDocumentor\Reflection\Types\Self_;

trait HasEnumValues
{
    public static function getValues() : array
    {
       return array_map(fn($source)=>$source->value, self::cases());
    }
}
