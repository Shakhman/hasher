<?php

namespace App\Traits;

trait RawTrait
{
    protected static function currentTimestamp()
    {
        return \DB::raw('CURRENT_TIMESTAMP');
    }

    protected static function onUpdateTimestamp()
    {
        return \DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }
}
