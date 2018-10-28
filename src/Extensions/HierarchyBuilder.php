<?php

namespace App\Extensions;

use Illuminate\Database\Eloquent\Model;
use Menu;

class HierarchyBuilder
{
    public static function build(Model $model, $locale)
    {
        $models = $model
            ->mergeI18n($locale)
            ->get()
            ->sortBy('name');

        $type = $model->getTable();

            Menu::make($model->getTable(), function ($menu) use ($models, $type) {

                self::recursiveGroup($menu, $type, $models);

            });

//        dd(Menu::get('cities'));
    }

    /**
     * Рекурсивное формирование блоков меню
     *
     * @param $menu
     * @param $type
     * @param $items
     * @param int $parentId
     * @param null $nickName
     * @param int $level
     */
    public static function recursiveGroup($menu, $type, $items, $parentId = 0, $nickName = null, $level = 0)
    {
        $locale = app()->getLocale();

        foreach ($items->where('parent_id', $parentId) as $item) {

            $url = $item->alias ?? $item->url;

            if ($nickName) {

                $menu->{$nickName}->add($item->name, $locale . '/' . $url)
                    ->nickname($url)
                    ->active($url . '/*')
                    ->data('level', $level)
                    ->data('model', $item);

            } else {

                $menu->add($item->name, $locale . '/' . $url)
                    ->nickname($url)
                    ->active($url . '/*')
                    ->data('level', $level)
                    ->data('model', $item);

            }

            $field = "{$type}_i18n_id";

            $submenu = $items->where('parent_id', $item->{$field});

            if ($submenu) {

                self::recursiveGroup($menu, $type, $items, $item->{$field}, $url, $level + 1);

            }

        }
    }
}
