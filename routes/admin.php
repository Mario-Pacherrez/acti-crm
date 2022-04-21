<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\User\UserController;
use App\Http\Controllers\Web\Admin\Leads\ClientLeadController;
use App\Http\Controllers\Web\Admin\Sales\SalesController;
use App\Http\Controllers\Web\Admin\Utility\SearchLeadsController;

/*Route::get('/', function () {
    return redirect(route('login'));
});*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('leads', ClientLeadController::class)->names('admin.leads');
    Route::resource('sales', SalesController::class)->only(['index', 'show','edit', 'update'])->names('admin.sales');

    //Route::get('details', [ClientLeadController::class, 'detailsIndex'])->name('admin.details');
    // Route::get('/search', [SearchLeadsController::class, 'search'])->name('web.search');
});