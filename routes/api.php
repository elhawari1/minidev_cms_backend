<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\AboutsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VissionsController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PhilosophysController;
use App\Http\Controllers\ProjectStepController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AboutsController::class)->group(function () {
    Route::get('/abouts', 'getAbouts');
    Route::post('/abouts/store', 'store');
    Route::post('/abouts/update/{id_about}', 'update');
    Route::delete('/abouts/destroy/{id_about}', 'destroy');
});

Route::controller(BannerController::class)->group(function () {
    Route::get('/banners', 'getBanner');
    Route::post('/banner/store', 'store');
    Route::post('/banner/update/{id_banner}', 'update');
    Route::post('/banner/destroy/{id_banner}', 'destroy');
});


Route::controller(ContactsController::class)->group(function () {
    Route::get('/contacts', 'getContacts');
    Route::post('/contacts/store', 'store');
    Route::post('/contacts/update/{id_contacts}', 'update');
    Route::post('/contacts/destroy/{id_contacts}', 'destroy');
});

Route::controller(GoalsController::class)->group(function () {
    Route::get('/goals', 'getGoals');
    Route::post('/goals/store', 'store');
    Route::post('/goals/update/{id_goals}', 'update');
    Route::post('/goals/destroy/{id_goals}', 'destroy');
});

Route::controller(MissionsController::class)->group(function () {
    Route::get('/missions', 'getMissions');
    Route::post('/missions/store', 'store');
    Route::post('/missions/update/{id_mission}', 'update');
    Route::post('/missions/destroy/{id_mission}', 'destroy');
});

Route::controller(PhilosophysController::class)->group(function () {
    Route::get('/philosophys', 'getPhilosophys');
    Route::post('/philosophy/store', 'store');
    Route::post('/philosophy/update/{id_philosophy}', 'update');
    Route::post('/philosophy/destroy/{id_philosophy}', 'destroy');
});

Route::controller(PortofolioController::class)->group(function () {
    Route::get('/portofolio', 'getPortofolio');
    Route::post('/portofolio/store', 'store');
    Route::post('/portofolio/update/{id_portofolio}', 'update');
    Route::post('/portofolio/destroy/{id_portofolio}', 'destroy');
});

Route::controller(ProjectStepController::class)->group(function () {
    Route::get('/projectstep', 'getProjectStep');
    Route::post('/projectStep/store', 'store');
    Route::post('/projectStep/update/{id_projectStep}', 'update');
    Route::post('/projectStep/destroy/{id_projectStep}', 'destroy');
});

Route::controller(ServicesController::class)->group(function () {
    Route::get('/services', 'getservices');
    Route::post('/service/store', 'store');
    Route::post('/service/update/{id_service}', 'update');
    Route::post('/service/destroy/{id_service}', 'destroy');
});

Route::controller(VissionsController::class)->group(function () {
    Route::get('/vissions', 'getVissions');
    Route::post('/vission/store', 'store');
    Route::post('/vission/update/{id_vission}', 'update');
    Route::post('/vission/destroy/{id_vission}', 'destroy');
});


