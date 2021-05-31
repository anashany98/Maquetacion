<?php

namespace App\Vendor\Coin;

use App\Vendor\Locale\Models\Coin as DBCoin_value;
use App\Vendor\Locale\Models\LocaleLanguage;

class Locale
{
    protected $rel_parent;
    protected $language;

    function __construct(DBCoin_value $locale)
    {
        $this->locale = $locale;
    }

    public function setParent($rel_parent)
    {
        $this->rel_parent = $rel_parent;
    }

    public function getParent()
    {
        return $this->rel_parent;
    }
    
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function store($locale, $key)
    {  

        foreach ($locale as $rel_anchor => $value){

            $rel_anchor = str_replace(['-', '_'], ".", $rel_anchor); 
            $explode_rel_anchor = explode('.', $rel_anchor);
            $language = end($explode_rel_anchor);
            array_pop($explode_rel_anchor); 
            $tag = implode(".", $explode_rel_anchor); 

            $locale[] = $this->locale->updateOrCreate([
                    'key' => $key,
                    'rel_parent' => $this->rel_parent,
                    'rel_anchor' => $rel_anchor],[
                    'rel_parent' => $this->rel_parent,
                    'price' =>  $price,
                    'symbol' =>  $symbol,          
            ]);
        }

        return $locale;
    }

    public function show($key)
    {
        return DBCoin_value::getValues($this->rel_parent, $key)->pluck('value','rel_anchor')->all();   
    }

    public function delete($key)
    {
        if (DBCoin_value::getValues($this->rel_parent, $key)->count() > 0) {

            DBCoin_value::getValues($this->rel_parent, $key)->delete();   
        }
    }

    public function getIdByLanguage($key){ 
        return DBCoin_value::getIdByLanguage($this->rel_parent, $this->language, $key)->pluck('value','tag')->all();
    }

    public function getAllByLanguage(){ 

        $items = DBCoin_value ::getAllByLanguage($this->rel_parent, $this->language)->get()->groupBy('key');

        $items =  $items->map(function ($item) {
            return $item->pluck('value','tag');
        });

        return $items;
    }
}