<?php

namespace Zhangbingliang\CountryCodeConverter;

class StateCodeServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(StateCodeConverter::class, function(){
            return new StateCodeConverter();
        });

        $this->app->alias(StateCodeConverter::class, 'StateCodeConverter');
    }

    public function provides()
    {
        return [StateCodeConverter::class, 'StateCodeConverter'];
    }
}