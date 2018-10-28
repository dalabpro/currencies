<?php


namespace Modules\Integration\Models\Observers;

use App;
use Auth;
use App\Models\Currency;

class CurrencyObserver
{
    /**
     * Listen to the Email creating event.
     *
     * @param Email #email
     * @return bool
     */
    public function creating(Currency $email)
    {
        if (!App::runningInConsole() && (Auth::guest() || Auth::user()->cannot('module.integration.email.create'))) {
            return false;
        }
    }
}
