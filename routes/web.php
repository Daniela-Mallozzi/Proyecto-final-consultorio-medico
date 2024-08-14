<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'detail'])->name('services.detail');
Route::get('/doctor/{slug}', [App\Http\Controllers\ServiceController::class, 'doctor'])->name('services.doctor');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/contact/show', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('contact.show');
    Route::put('/contact/update/{id}', [App\Http\Controllers\Admin\ContactController::class, 'update'])->name('contact.update');

    Route::resource('specialties', App\Http\Controllers\Admin\SpecialtyController::class);
    Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('medicos', App\Http\Controllers\Admin\DoctorController::class);
    Route::resource('pacientes', App\Http\Controllers\Admin\PatientController::class);
});

Route::middleware(['auth', 'doctor'])->group(function () {    
    Route::get('/horario', [App\Http\Controllers\Doctor\HorarioController::class, 'edit'])->name('horario.edit');
    Route::post('/horario', [App\Http\Controllers\Doctor\HorarioController::class, 'store'])->name('horario.store');

});

Route::middleware('auth')->group(function(){

    Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

    Route::get('/reportes/pdfs', [App\Http\Controllers\Admin\ReporteController::class, 'generarPdf'])->name('reporte.citas.generarPdf');
    Route::get('/reportes/excel', [App\Http\Controllers\Admin\ReporteController::class, 'generarExcel'])->name('reporte.citas.generarExcel');
    Route::get('/reportes/doctors/column/data', [App\Http\Controllers\AdminController::class, 'doctorsJson']);
    
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/updatePass', [App\Http\Controllers\Admin\ProfileController::class, 'updatePass'])->name('profile.updatePass');
   
    Route::get('/miscitas', [App\Http\Controllers\AppointmentController::class, 'index'])->name('miscitas.index');
    Route::get('/miscitas/pendients', [App\Http\Controllers\AppointmentController::class, 'pendient'])->name('miscitas.pendient');
    Route::get('/miscitas/historial', [App\Http\Controllers\AppointmentController::class, 'historial'])->name('miscitas.historial');

    Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmentController::class, 'create'])->name('miscitas.create');
    Route::post('/reservarcitas', [App\Http\Controllers\AppointmentController::class, 'store'])->name('miscitas.store');
    Route::get('/miscitas/{appointment}', [App\Http\Controllers\AppointmentController::class, 'show'])->name('miscitas.show');
    Route::post('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel'])->name('miscitas.cancel');
    Route::post('/miscitas/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class, 'confirm'])->name('miscitas.confirm');
    Route::put('/miscitas/{appointment}/atender', [App\Http\Controllers\AppointmentController::class, 'atender'])->name('miscitas.atender');

    Route::get('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'formCancel'])->name('miscitas.cancel');
    
    //JSON
    Route::get('/especialidades/{specialty}/medicos', [App\Http\Controllers\Api\SpecialtyController::class, 'doctors']);
    Route::get('/horario/horas', [App\Http\Controllers\Api\HorarioController::class, 'hours']); 

});

Auth::routes();
