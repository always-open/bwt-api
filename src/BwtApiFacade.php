<?php

namespace AlwaysOpen\BwtApi;

use Illuminate\Support\Facades\Facade;

class BwtApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BwtApiClient::class;
    }
}
