<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\LocaleSlugSeo;
use App\Models\DB\Coin;
use Debugbar;

class CoinController extends Controller
{
    protected $agent;
    protected $coin;
    protected $locale_slug_seo;

    function __construct(Agent $agent, Coin $coin, LocaleSlugSeo $locale_slug_seo)
    {
        $this->agent = $agent;
        $this->coin = $coin;
        $this->locale_slug_seo = $locale_slug_seo;

        $this->locale_slug_seo->setLanguage(app()->getLocale()); 
        $this->locale_slug_seo->setParent('coins');      
    }

    public function index()
    {        
        $seo = $this->locale_slug_seo->getByKey(Route::currentRouteName());

        if($this->agent->isDesktop()){

            $coins = $this->coin
                    ->with('image_featured_desktop')
                    ->where('active', 1)
                    // ->where('visible', 1)
                    ->get();
        }
        
        elseif($this->agent->isMobile()){
            $coins = $this->coin
                    ->with('image_featured_mobile')
                    ->where('active', 1)
                    // ->where('visible', 1)
                    ->get();
        }

        $coins = $coins->each(function($coin){  
            
            $coin['locale'] = $coin->locale->pluck('value','tag');
            
            return $coin;
        });

        $view = View::make('front.pages.coins.index')->with('coins', $coins);

        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'view' => $sections['content'],
            ]); 
        }
        
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
                    // ->where('visible', 1)
                    ->find($seo->key);
            }
            
            elseif($this->agent->isMobile()){
                $coin = $this->coin
                    ->with('image_featured_mobile')
                    ->with('image_grid_mobile')
                    ->where('active', 1)
                    // ->where('visible', 1)
                    ->find($seo->key);
            }

            $coin['locale'] = $coin->locale->pluck('value','tag');

            $view = View::make('front.pages.coins.single')->with('coin', $coin);

            if(request()->ajax()) {

                $sections = $view->renderSections(); 
        
                return response()->json([
                    'view' => $sections['content'],
                ]); 
            }
            
            return $view;

        }else{
            // return response()->view('errors.404', [], 404);
        }
    }
}
