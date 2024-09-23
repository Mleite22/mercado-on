<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

//rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//Rota para ver o perfil admin
Route::get('admin/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'admin'])
->name('admin.profile');
//Rota para atualizar o Usuario
Route::post('admin/profile/update', [ProfileController::class, 'update'])
->middleware(['auth', 'admin'])
->name('admin.profile.uptade');

//Rota para atualizar s Senha
Route::post('admin/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth', 'admin'])
->name('admin.profile.password');