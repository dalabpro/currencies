<?php

namespace App\Extensions;

use Menu;

class MenuBuilder
{
    public static function build()
    {
        Menu::make('sidebar', function ($menu){

            // First Level

            // Second Level

            $menu->settings->add(trans("backend.menu.currencies"), route('backend.currencies.index'))
                ->active('settings/currencies/*')
                ->data('order', 4);
        });
    }
}
