<?php

namespace Kgregorywd\Currencies;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'currencies';
    }
}
