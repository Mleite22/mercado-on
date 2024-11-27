<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//chama todas as rotas para web 
foreach(File::allFiles(__DIR__ .'/web') as $route_file){
    $route = require $route_file->getPathname();
}

require __DIR__.'/auth.php';


//rota para o login do admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

//rota recuperação de senha
Route::get('admin/forgot-password', [AdminController::class, 'forgot'])->name('admin.forgot');

//rota de logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');