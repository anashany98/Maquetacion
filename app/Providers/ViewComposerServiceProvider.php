<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    
   
    public function boot()
    {
        view()->composer([
            'admin.faqs.index'],
            'App\Http\ViewComposer\Admin\FaqsCategories'
        );
        
    }

    public function register()
    {
        //
    }

}

