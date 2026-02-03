<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        \Illuminate\Support\Facades\DB::statement("SET foreign_key_checks=0"); 
        $databaseName = \Illuminate\Support\Facades\DB::getDatabaseName();
        $tables = \Illuminate\Support\Facades\DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
                
 
    }
}
