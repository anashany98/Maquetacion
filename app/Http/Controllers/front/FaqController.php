<?php

namespace App\Http\Controllers\front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Faq;
use Jenssegers\Agent\Agent;
use App\Vendor\Locale\Locale;
use App;
use Debugbar;

class FaqController extends Controller
{
    protected $faq;
    protected $agent;
    protected $locale;

    function __construct(Faq $faq, Locale $locale, Agent $agent)
    {
        $this->faq = $faq;
        $this->agent = $agent;
        $this->locale = $locale;

        $this->locale->setParent('faqs');
        $this->locale->setLanguage(App::getLocale());

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
}
