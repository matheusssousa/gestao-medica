<?php

use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('pacientes', PacienteController::class);

    Route::resource('medicos', MedicoController::class);

    Route::resource('atendimentos', AtendimentoController::class);
});
