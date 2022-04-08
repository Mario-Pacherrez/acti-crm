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
use App\Http\Controllers\Web\Lead\ClientLeadController;

/* Package: User */
use App\Http\Controllers\Web\User\UserController;

//Route::post('');

//Route::post('logout', [\Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/', function () {
    //return view('welcome');
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('leads', ClientLeadController::class);
    Route::resource('users', UserController::class);
});

/*
 *
 * Route::get('/run-migrations', function () {
    return Artisan::call('migrate', ["--force" => true ]);
});
 */