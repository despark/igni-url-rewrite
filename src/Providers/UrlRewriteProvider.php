<?php


namespace Despark\Cms\UrlRewrite\Providers;


use Despark\Cms\UrlRewrite\Listeners\AfterSidebarSet;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class UrlRewriteProvider extends EventServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Despark\Cms\Events\Admin\AfterSidebarSet::class => [
            AfterSidebarSet::class,
        ],
    ];

    /**
     * Register any other events
     *
     * @return void
     */
    public function boot()
    {
        // Routes
        \Route::group(['namespace' => 'Despark\Cms\UrlRewrite\Http\Controllers', 'middleware' => ['web']],
            function ($router) {
                require __DIR__.'/../routes/web.php';
            });

        parent::boot();


    }

    public function register()
    {
        parent::register();
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations'),
        ], 'migrations');
    }

}