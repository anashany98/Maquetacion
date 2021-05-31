<?php

namespace App\Http\Controllers\front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Coin;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\Locale;
use App\Vendor\Locale\LocaleSlugSeo;
use App;
use Debugbar;

class CoinController extends Controller
{
    protected $coin;
    protected $agent;
    protected $locale;
    protected $locale_slug_seo;


    function __construct(coin $coin, Locale $locale, Agent $agent, LocaleSlugSeo $locale_slug_seo)
    {
        $this->coin = $coin;
        $this->agent = $agent;
        $this->locale = $locale;
        $this->locale_slug_seo = $locale_slug_seo;


        $this->locale->setParent('coins');
        $this->locale->setLanguage(App::getLocale());

        $this->locale_slug_seo->setLanguage(app()->getLocale()); 
        $this->locale_slug_seo->setParent('coins'); 

    }

    public function index()
    {
        $coins = $this->coin->where('active', 1)->get();

        $coins = $coins->each(function($coin){

            $coin['locale'] = $coin->locale->pluck('value', 'tag');

            return $coin;
            
        });

        $view = View::make('front.coins.index')
                ->with('coins', $coins );


        return $view;

    }


    public function show($slug)
    {      
        $seo = $this->locale_slug_seo->getIdByLanguage($slug);

        if(isset($seo->key)){

            if($this->agent->isDesktop()){
                $coin = $this->coin
                    ->with('image_featured_desktop')
                    ->with('image_grid_desktop')
                    ->where('active', 1)
                    ->find($seo->key);
            }
            
            elseif($this->agent->isMobile()){
                $coin = $this->coin
                    ->with('image_featured_mobile')
                    ->with('image_grid_mobile')
                    ->where('active', 1)
                    ->find($seo->key);
            }

            $coin['locale'] = $coin->locale->pluck('value','tag');

            $view = View::make('front.pages.coins.single')->with('coin', $coin);

            return $view;

        }else{
            return response()->view('errors.404', [], 404);
        }
    }
}
