<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Student\StudentRepositoryInterface;
use App\Infrastructure\Student\EloquentStudentRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StudentRepositoryInterface::class, EloquentStudentRepository::class);
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
