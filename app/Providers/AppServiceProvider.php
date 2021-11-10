<?php

namespace App\Providers;

use App\Book;
use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add([
                'text'        => 'Users ',
                'url'         => 'admin/users',
                'icon'        =>  'far fa-fw fa-user',
                'label'       => User::count(),
                'label_color' => 'success',
            ] ,
            [
                'text'        => 'Categories ',
                'url'         => 'admin/categories',
                'icon'        => 'fas fa-bars',
                'label'       => Category::count() ,
                'label_color' => 'success',
            ],
            [
                'text'        => 'Books ',
                'url'         => 'admin/books',
                'icon'        => 'fas fa-book',
                'label'       => Book::count() ,
                'label_color' => 'success',
            ],
            [
                    'text'       => 'Go To Website',
                    'icon_color' => 'green',
                    'icon'       => 'fas fa-arrow-left',
                    'url'        => ('/'),
            ]
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
