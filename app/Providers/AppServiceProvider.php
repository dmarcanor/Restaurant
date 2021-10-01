<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sys\Restaurant\Table\Domain\Contracts\TableRepository;
use Sys\Restaurant\Table\Infrastructure\Persistence\MysqlTableRepository;

class AppServiceProvider extends ServiceProvider
{
    private $wiringObjects = [
        TableRepository::class => MysqlTableRepository::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->wiringObjects as $abstract => $implementation) {
            $this->app->bind($abstract, $implementation);
        }
    }
}
