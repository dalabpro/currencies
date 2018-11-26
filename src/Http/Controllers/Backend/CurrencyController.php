<?php

namespace Dalab\Currencies\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use Dalab\Currencies\Models\Currency;

class CurrencyController extends BackendController
{

    public function __construct(Request $request, Currency $model)
    {
        parent::__construct($request, $model);

        $this->middleware(function ($request, $next) {

            $this->setCollect([
                'titleIndex' => trans("currency::{$this->prefix}.{$this->getCollect('type')}.title_index"),
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
            ->setCollect('models', $model->paginate(25))
            ->setCollect('breadcrumbs', (String)view()->make('backend.ajax.breadcrumb', $this->getCollect())->render());

        return view('currency::backend.currencies.index', $this->getCollect());
    }
}
