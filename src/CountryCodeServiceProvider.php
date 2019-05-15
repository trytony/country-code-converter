<?php

namespace Zhangbingliang\CountryCodeConverter;

class CountryCodeServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(CountryCodeConverter::class, function(){
            return new CountryCodeConverter();
        });


        $this->app->alias(CountryCodeConverter::class, 'CountryCodeConverter');
    }

    public function provides()
    {
        return [CountryCodeConverter::class, 'CountryCodeConverter'];
    }
}