<?php

namespace Kgregorywd\Currencies\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Kgregorywd\Currencies\Models\Currency;

class CurrencyController extends BackendController
{

    public function __construct(Request $request, Currency $model)
    {
        parent::__construct($request, $model);

        $this->middleware(function ($request, $next) {

            $this->setCollect([
                'titleIndex' => trans("currency::{$this->prefix}.{$this->getCollect('type')}.title_index"),
                'titleCreate' => trans("currency::{$this->prefix}.{$this->getCollect('type')}.title_create"),
                'titleShow' => trans("currency::{$this->prefix}.{$this->getCollect('type')}.title_show"),
                'titleEdit' => trans("currency::{$this->prefix}.{$this->getCollect('type')}.title_edit"),
                'viewPath' => $this->getCollect('viewPath'),
            ])->setCollect([
                'breadcrumbs' => array_merge($this->getCollect('breadcrumbs'), [
                    [
                        'name' => $this->getCollect('titleIndex'),
                        'url' => route("backend.{$this->getCollect('type')}.index")
                    ],
                ]),
            ]);

            return $next($request);
        });
    }

    public function index(Currency $model)
    {

        $this
            ->setCollect('model', $model)
            ->setCollect('models', $model->all())
            ->setCollect('breadcrumbs', (String)view()->make('backend.ajax.breadcrumb', $this->getCollect())->render());

//        dd($this->getCollect());
        return view('currency::backend.currencies.index', $this->getCollect());
//        dd('currencies');
    }
}
