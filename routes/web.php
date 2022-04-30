<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Package: Client Lead */
use App\Http\Controllers\Web\General\Lead\LeadsController;
use App\Http\Controllers\Web\General\Lead\LeadDetailController;
use App\Http\Controllers\Web\General\Lead\MyLeadsController;

Route::get('/', function () {
    //return view('welcome');
    return redirect(route('login'));
});

Route::get('/logout', function () {
    //return view('welcome');
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('leads', LeadsController::class)->names('leads');
    Route::resource('myleads', MyLeadsController::class)->names('myleads');

    Route::get('myleads/{id_client_lead}/details', [LeadDetailController::class, 'show'])->name('myleads.details.show');
    Route::get('myleads/{id_client_lead}/details/create', [LeadDetailController::class, 'create'])->name('myleads.details.create');
    Route::post('myleads/details/{id_client_lead}', [LeadDetailController::class, 'store'])->name('myleads.details.store');
    /*Route::get('myleads/details/{id_client_lead}/edit', [LeadDetailController::class, 'edit'])->name('myleads.details.edit');
    Route::put('myleads/details/{id_client_lead}', [LeadDetailController::class, 'update'])->name('myleads.details.update');*/
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('general.user-home');
})->name('user.home');*/

// Ruta para ejecutar comandos artisan desde la web
/*
Route::get('/cmd/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
});*/

/*
Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});*/

/*Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
    return $exitCode;
});*/

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    //Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});