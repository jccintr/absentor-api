<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login Controller ====================================================
Route::post('/signin',[LoginController::class,'signIn']);
// Cadastro Controller ====================================================
Route::post('/signup',[CadastroController::class,'signUp']);
// Empresa Controller ====================================================
Route::post('/empresas',[EmpresaController::class,'store']);
Route::get('/empresas',[EmpresaController::class,'index']);
Route::get('/empresas/{id}', [EmpresaController::class, 'show']);
Route::put('/empresas/{id}', [EmpresaController::class, 'update']);
Route::get('/empresas/{id}/users', [EmpresaController::class, 'users']);
//  User controller========================================================
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{id}',[UserController::class,'show']);
Route::put('/users/{id}', [UserController::class, 'update']);