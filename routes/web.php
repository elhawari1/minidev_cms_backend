<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VissionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PhilosophysController;
use App\Http\Controllers\ProjectStepController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [DashboardController::class, 'index'])->name('dasboard');

Route::controller(AboutsController::class)->group(function () {
    Route::get('/about', 'index')->name('about');
    Route::post('/about/store', 'store');
    Route::post('/about/update/{id_about}', 'update');
    Route::get('/about/destroy/{id_about}', 'destroy');
});

Route::controller(BannerController::class)->group(function () {
    Route::get('/banner', 'index')->name('banner');
    Route::post('/banner/store', 'store');
    Route::post('/banner/update/{id_banner}', 'update');
    Route::get('/banner/destroy/{id_banner}', 'destroy');
});

Route::controller(ContactsController::class)->group(function () {
    Route::get('/contacts', 'index')->name('contacts');
    Route::post('/contacts/store', 'store');
    Route::post('/contacts/update/{id_contacts}', 'update');
    Route::get('/contacts/destroy/{id_contacts}', 'destroy');
});

Route::controller(GoalsController::class)->group(function () {
    Route::get('/goals', 'index')->name('goals');
    Route::post('/goals/store', 'store');
    Route::post('/goals/update/{id_goals}', 'update');
    Route::get('/goals/destroy/{id_goals}', 'destroy');
});

Route::controller(MissionsController::class)->group(function () {
    Route::get('/missions', 'index')->name('missions');
    Route::post('/missions/store', 'store');
    Route::post('/missions/update/{id_mission}', 'update');
    Route::get('/missions/destroy/{id_mission}', 'destroy');
});

Route::controller(PhilosophysController::class)->group(function () {
    Route::get('/philosophys', 'index')->name('philosophys');
    Route::post('/philosophys/store', 'store');
    Route::post('/philosophys/update/{id_philosophy}', 'update');
    Route::get('/philosophys/destroy/{id_philosophy}', 'destroy');
});

Route::controller(PortofolioController::class)->group(function () {
    Route::get('/portofolio', 'index')->name('portofolio');
    Route::post('/portofolio/store', 'store');
    Route::post('/portofolio/update/{id_portofolio}', 'update');
    Route::get('/portofolio/destroy/{id_portofolio}', 'destroy');
});

Route::controller(ProjectStepController::class)->group(function () {
    Route::get('/projectStep', 'index')->name('projectStep');
    Route::post('/projectStep/store', 'store');
    Route::post('/projectStep/update/{id_projectstep}', 'update');
    Route::get('/projectStep/destroy/{id_projectstep}', 'destroy');
});

Route::controller(ServicesController::class)->group(function () {
    Route::get('/services', 'index')->name('services');
    Route::post('/services/store', 'store');
    Route::post('/services/update/{id_service}', 'update');
    Route::get('/services/destroy/{id_service}', 'destroy');
});

Route::controller(VissionsController::class)->group(function () {
    Route::get('/vissions', 'index')->name('vissions');
    Route::post('/vissions/store', 'store');
    Route::post('/vissions/update/{id_vission}', 'update');
    Route::get('/vissions/destroy/{id_vission}', 'destroy');
});

