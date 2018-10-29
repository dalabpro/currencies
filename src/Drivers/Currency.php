<?php

namespace Kgregorywd\Currencies\Drivers;

use Kgregorywd\Currencies\Models\ObjectModel;
use View;

class Currency
{
    public static function getBackendTemplate($model, $locale)
    {
        $object = $model->exists ? (new ObjectModel())
            ->with('currencies')
            ->find($model->id) : $model;

        $alias = $locale === 'tr' ? 'lira' : 'euro';
        $currencies = $object->currencies;

        return (string) View::make('currency::backend.ajax.backend', compact(
            'object',
            'alias',
            'currencies'
        ))->render();
    }

    public static function getFrontendTemplate($model, $locale)
    {
        $object = $model->exists ? (new ObjectModel())
            ->with('currencies')
            ->find($model->id) : $model;

        $alias = $locale === 'tr' ? 'lira' : 'euro';
        $currencies = $object->currencies;

        return (string) View::make('currency::backend.ajax.frontend', compact(
            'object',
            'alias',
            'currencies'
        ))->render();
    }

    public static function getPrice($model, $locale)
    {
        $object = $model->exists ? (new ObjectModel())
            ->with('currencies')
            ->find($model->id) : $model;

        $alias = $locale === 'tr' ? 'lira' : 'euro';
        $currency = $object->currencies->where('alias', $alias)->first();

        if ($currency) {

            $price = optional($currency->pivot)->price;

            return "{$price} {$currency->icon}";
        } else {
            return "{$object->price} €";
        }
    }
}
