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
    Route::get('perfil', [App\Http\Controllers\UserController::class, 'index'])->name('perfil');
    Route::post('perfil/info', [App\Http\Controllers\UserController::class, 'accountInfo'])->name('perfil.info');
    Route::post('perfil/senha', [App\Http\Controllers\UserController::class, 'password'])->name('perfil.senha');
    Route::post('perfil/deletar', [App\Http\Controllers\UserController::class, 'delete'])->name('perfil.deletar');

    Route::resource('pacientes', PacienteController::class);

    Route::resource('medicos', MedicoController::class);

    Route::resource('atendimentos', AtendimentoController::class);
});
