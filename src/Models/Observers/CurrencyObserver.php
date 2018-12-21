<?php


namespace Dalabpro\Currencies\Models\Observers;

use App;
use Auth;
use Dalabpro\Currencies\Models\Currency;

class CurrencyObserver
{
    /**
     * Listen to the Email creating event.
     *
     * @param Currency $email
     * @return bool
     */
    public function creating(Currency $email)
    {
        if (!App::runningInConsole() && (Auth::guest() || Auth::user()->cannot('module.integration.email.create'))) {
            return false;
        }
    }
}
