<?php

namespace Abdazz\GovPayClient\Facades;

use Illuminate\Support\Facades\Facade;

class GovPayClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'govpayclient';
    }
}
