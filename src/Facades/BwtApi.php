<?php

namespace AlwaysOpen\BwtApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AlwaysOpen\BwtApi\BwtApi
 */
class BwtApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AlwaysOpen\BwtApi\BwtApi::class;
    }
}
