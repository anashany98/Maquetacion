<?php

namespace App\Models\DB;

class Slider extends DBModel
{

    protected $table = 't_sliders';

    public function customer()
    {
        return $this->belongsTo(Sliders::class, 'sliders_id');
    }
}