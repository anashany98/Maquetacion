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

        view()->composer([
            'admin.*'], 
            'App\Http\ViewComposer\Admin\LocaleLanguage'
        );

        view()->composer(
            'admin.tags.index', 
            'App\Http\ViewComposer\Admin\LocaleGroups'
        );

        // view()->composer(
        //     'admin.coins.index', 
        //     'App\Http\ViewComposer\Admin\coins'
        // );
    }

    public function register()
    {
        //
    }

}

