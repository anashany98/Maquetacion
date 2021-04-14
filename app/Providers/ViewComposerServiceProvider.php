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

        view()->composer([
            'admin.customers.index'],
            'App\Http\ViewComposer\Admin\Countries'
        );
        
    }

    public function register()
    {
        //
    }

}

