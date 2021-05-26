<?php

namespace App\Http\Controllers\front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Faq;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\Locale;
use App\Vendor\Locale\LocaleSlugSeo;
use App;
use Debugbar;

class FaqController extends Controller
{
    protected $faq;
    protected $agent;
    protected $locale;
    protected $locale_slug_seo;


    function __construct(Faq $faq, Locale $locale, Agent $agent, LocaleSlugSeo $locale_slug_seo)
    {
        $this->faq = $faq;
        $this->agent = $agent;
        $this->locale = $locale;
        $this->locale_slug_seo = $locale_slug_seo;


        $this->locale->setParent('faqs');
        $this->locale->setLanguage(App::getLocale());

        $this->locale_slug_seo->setLanguage(app()->getLocale()); 
        $this->locale_slug_seo->setParent('faqs'); 

    }

    public function index()
    {
        $faqs = $this->faq->where('active', 1)->get();

        $faqs = $faqs->each(function($faq){

            $faq['locale'] = $faq->locale->pluck('value', 'tag');

            return $faq;
            
        });

        $view = View::make('front.faqs.index')
                ->with('faqs', $faqs );


        return $view;

    }


    public function show($slug)
    {      
        $seo = $this->locale_slug_seo->getIdByLanguage($slug);

        if(isset($seo->key)){

            if($this->agent->isDesktop()){
                $faq = $this->faq
                    ->with('image_featured_desktop')
                    ->with('image_grid_desktop')
                    ->where('active', 1)
                    ->find($seo->key);
            }
            
            elseif($this->agent->isMobile()){
                $faq = $this->faq
                    ->with('image_featured_mobile')
                    ->with('image_grid_mobile')
                    ->where('active', 1)
                    ->find($seo->key);
            }

            $faq['locale'] = $faq->locale->pluck('value','tag');

            $view = View::make('front.pages.faqs.single')->with('faq', $faq);

            return $view;

        }else{
            return response()->view('errors.404', [], 404);
        }
    }
}
