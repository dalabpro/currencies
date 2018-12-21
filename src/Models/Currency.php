<?php

namespace Dalabpro\Currencies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dalabpro\Currencies\Models\Observers\CurrencyObserver;

class Currency extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
        'code',
        'icon',
        'ratio',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function boot()
    {
        parent::boot();

        self::observe(CurrencyObserver::class);
    }

    public function objects()
    {
        return $this->belongsToMany(ObjectModel::class, 'currency_object', 'currency_id', 'object_id')->withPivot(['price', 'price_old', 'price_day']);
    }
}
