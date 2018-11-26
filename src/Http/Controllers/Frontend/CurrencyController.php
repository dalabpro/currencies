<?php

namespace Dalab\Currencies\Http\Controllers\Frontend;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Dalab\Currencies\Models\Currency;
use Dalab\Currencies\Models\ObjectModel;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Symfony\Component\DomCrawler\Crawler;

class CurrencyController extends FrontendController
{

    public function __construct(Request $request, Currency $model)
    {
        $this->middleware(function ($request, $next) {

            return $next($request);
        });
    }

    public function parse()
    {
        $link = "http://www.tcmb.gov.tr/kurlar/today.xml";
        $data = [];
        $method = 'GET';

        $results = $this->curl($link, $data, $method);

        $xml = simplexml_load_string($results);

        $data = [
            'TRY' => 1,
        ];

        foreach ($xml->Currency as $item) {
            $code = (string)$item['Kod'];
            if ($code === 'USD' || $code === 'EUR' || $code === 'RUB') {
                $data[$code] = (float)$item->ForexSelling;
            }
        }

        $currencies = Currency::all();

        foreach ($data as $key => $item) {
            $currency = $currencies->where('code', $key)->first();
            $currency->ratio = $item;
        }

        $objects = ObjectModel::all();

        $currencyEuro = $currencies->where('code', 'EUR')->first();

        foreach ($objects as $key => $object) {
            $tryPrice = (int)$object->price * $currencyEuro->ratio;
            $object->currencies()->detach();
            foreach ($currencies as $currency) {
                $price = $tryPrice / (float)$currency->ratio;
                $object->currencies()->attach($currency->id, [
                    'price' => (int)$price,
                ]);
            }
        }

        foreach ($currencies as $currency) {
            $currency->save();
        }
    }

    protected function curl(string $link, array $data = [], string $method)
    {
        $url = url("");
        $curl = curl_init();
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => "PHP Bot ({$url})",
            CURLOPT_HEADER => false,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
        );
        if($method == 'POST') {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = http_build_query($data);
            $options[CURLOPT_URL] = $link;
        } else {
            $options[CURLOPT_URL] = $link.'?'. http_build_query($data);
        }
        curl_setopt_array($curl, $options);
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
