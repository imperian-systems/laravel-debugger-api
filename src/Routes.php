<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ImperianSystems\LaravelDebuggerApi\Middleware\LaravelDebugger;
use ImperianSystems\LaravelDebuggerApi\Controllers\TableController;
use ImperianSystems\LaravelDebuggerApi\Controllers\RowController;
use ImperianSystems\LaravelDebuggerApi\Controllers\RouteController;
use ImperianSystems\LaravelDebuggerApi\Controllers\LogController;

Route::middleware(LaravelDebugger::class)->prefix('api/')->group(function () {
    Route::resource('table', TableController::class);
    Route::resource('table/{table}/row', RowController::class);

    Route::resource('route', RouteController::class);

    Route::resource('log', LogController::class);
});
