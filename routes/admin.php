<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\User\UserController;

//Route::resource('users', UserController::class)->names('admin.users');

Route::group(['middleware' => 'auth'], function () {
    //Route::resource('leads', ClientLeadController::class);
    Route::resource('users', UserController::class);
});