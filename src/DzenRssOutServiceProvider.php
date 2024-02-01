<?php

namespace Pshilyaev\DzenRssOut;
use Illuminate\Support\ServiceProvider;

class DzenRssOutServiceProvider extends ServiceProvider
{
    /**
     * Регистрация сервис-провайдера.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('dzen-rss-out', function () {
            return new DzenRssOut;
        });
    }

    /**
     * Загрузка сервис-провайдера после загрузки фреймворка.
     *
     * @return void
     */
    public function boot()
    {

    }
}