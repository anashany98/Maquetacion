<?php

namespace App\Vendor\Coin\Models;

use Illuminate\Database\Eloquent\Model;
use Debugbar;

class Coin extends Model
{
    protected $table = 't_coins_value';
    protected $guarded = [];

    public function scopeGetValues($query, $rel_parent, $key){

        return $query->where('key', $key)
            ->where('rel_parent', $rel_parent);
    }

    public function scopeGetIdByLanguage($query, $rel_parent, $key){
        
        return $query->where('key', $key)
            ->where('rel_parent', $rel_parent);
    }

    public function scopeGetAllByLanguage($query, $rel_parent){

        return $query->where('rel_parent', $rel_parent);
    }
}