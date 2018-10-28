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
                    "icon" => "₽",
                    "ratio" => 1,
                ],
                [
                    "name" => "Евро",
                    "icon" => "€",
                    "ratio" => 1,
                ],
                [
                    "name" => "Лира",
                    "icon" => "£",
                    "ratio" => 1,
                ],
                [
                    "name" => "Доллар",
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
