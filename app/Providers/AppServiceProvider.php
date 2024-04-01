<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Repository\InvoiceRepositoryInterface;
use Src\Infraestructure\Repository\Invoice\EloquentInvoiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            InvoiceRepositoryInterface::class,
            EloquentInvoiceRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
