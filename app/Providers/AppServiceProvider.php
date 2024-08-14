<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Specialty;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::composer('*', function ($view) {
            $contact = Contact::first(); // Obtener todos los contactos de la base de datos
            $specialties = Specialty::all(); // Obtener todos los contactos de la base de datos
            $view->with(['contact' => $contact, 'especialiades' => $specialties]); // Pasar los contactos a todas las vistas
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
