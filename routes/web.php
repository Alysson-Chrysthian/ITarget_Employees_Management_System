<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/auth')
    ->middleware('guest:admin')
    ->group(function () {

        Route::get('/login', App\Livewire\Auth\Login::class)
            ->name('login');

});

Route::middleware('auth:admin')
    ->group(function () {

        Route::get('/', App\Livewire\ShowEmployees::class)
            ->name('show');
        
        Route::get('/create', App\Livewire\AddEmployee::class)
            ->name('create');

        Route::get('/update/{employee}', App\Livewire\UpdateEmployees::class)
            ->name('update');

    });
    