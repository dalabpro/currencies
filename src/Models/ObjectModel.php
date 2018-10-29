<?php

namespace Kgregorywd\Currencies\Models;

use App\Models\Calendar;
use App\Models\CategoryI18n;
use App\Models\Contact;
use App\Models\DefaultModel;
use App\Models\ObjectModelI18n;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Observers\ObjectObserver;

class ObjectModel extends Model
{
    use SoftDeletes, DefaultModel;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'objects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'object_number',
        'wp_object_id',
        'area',
        'price',
        'price_old',
        'price_day',
        'bathroom',
        'floor',
        'city',
        'sea',
        'bedroom',
        'year',
        'xml',
        'sticker_color',
        'agent',
        'category_property',
        'object_type',
        'action_type',
        'type_property',
        'latitude',
        'longitude',
        'photo',
        'photos',
        'youtube',
        'aydat',
        'is_active',
        'group_lang',
        'note_base',
        'note_additionally',
        'note_images',
        'note_personal',
        'note_rent',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public static function boot()
    {
        parent::boot();

        self::observe(ObjectObserver::class);
    }

    public function i18n()
    {
        return $this->hasMany(ObjectModelI18n::class, 'object_id')->active();
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_object', 'contact_id', 'object_id');
    }

    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }

    public function personal()
    {
        return $this->hasOne(Personal::class, 'object_id');
    }

    public function categories()
    {
        return $this->belongsToMany(CategoryI18n::class, 'category_object', 'object_id', 'category_id');
    }

    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'currency_object', 'object_id', 'currency_id')->withPivot(['price', 'price_old', 'price_day']);
    }
}
