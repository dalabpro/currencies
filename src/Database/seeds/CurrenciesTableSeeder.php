<?php

namespace Kgregorywd\Currencies\Database\Seed;

use DB;
use Illuminate\Database\Seeder;
use Kgregorywd\Currencies\Models\Currency;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Currency::count()) {

            $currencies = [
                [
                    "name" => "Рубль",
                    "alias" => "ruble",
                    "code" => "RUB",
                    "icon" => "₽",
                    "ratio" => 1,
                ],
                [
                    "name" => "Евро",
                    "alias" => "euro",
                    "code" => "EUR",
                    "icon" => "€",
                    "ratio" => 1,
                ],
                [
                    "name" => "Лира",
                    "alias" => "lira",
                    "code" => "TRY",
                    "icon" => "£",
                    "ratio" => 1,
                ],
                [
                    "name" => "Доллар",
                    "alias" => "dollar",
                    "code" => "USD",
                    "icon" => "$",
                    "ratio" => 1,
                ],
            ];

            foreach ($currencies as $currency) {

                Currency::create($currency);
            }
        }
    }

}
