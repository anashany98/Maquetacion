<?php

namespace App\Models\DB;

use App\Vendor\Locale\Models\Locale;
use App\Vendor\Locale\Models\LocaleSlugSeo;
use App\Vendor\Image\Models\ImageResized;
use App;

class Coin extends DBModel
{

    protected $table = 't_coin_value';

    public function seo()
    {
        return $this->hasOne(LocaleSlugSeo::class, 'key')->where('rel_parent', 'coins')->where('language', App::getLocale());
    }

    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'faqs')->where('language', App::getLocale());
    }

    // public function price()
    // {
    //     return $this->hasOne(price::class, 'price')->where( 'price')->where('language', App::getLocale());
    // }

    public function images_featured_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'featured')->where('entity', 'coins');
    }

    public function image_featured_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'featured')->where('entity', 'coins')->where('language', App::getLocale());
    }

    public function image_featured_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'featured')->where('entity', 'coins')->where('language', App::getLocale());
    }

    public function images_grid_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'grid')->where('entity', 'coins');
    }

    public function image_grid_desktop()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'grid')->where('entity', 'coins')->where('language', App::getLocale());
    }

    public function image_grid_mobile()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'grid')->where('entity', 'coins')->where('language', App::getLocale());
    }


}
