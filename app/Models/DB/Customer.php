<?php

namespace App\Models\DB;

class Customer extends DBModel
{

    protected $table = 't_customers';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}