<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\User\UserController;
use App\Http\Controllers\Web\Admin\Leads\ClientLeadController;
use App\Http\Controllers\Web\Admin\Sales\SalesController;
use App\Http\Controllers\Web\Admin\Sales\LeadDetailController;
use App\Http\Controllers\Web\Admin\Reports\ReportController;

/*Route::get('/', function () {
    return redirect(route('login'));
});*/
// reports
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('leads', ClientLeadController::class)->names('admin.leads');
    Route::resource('sales', SalesController::class)->only(['index', 'show','edit', 'update'])->names('admin.sales');
    Route::get('sales/{id_client_lead}/details', [LeadDetailController::class, 'show'])->name('admin.sales.details.show');

    Route::resource('reports', ReportController::class)->only(['index'])->names('admin.reports');
});