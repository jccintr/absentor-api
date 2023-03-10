<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaltaController;

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
Route::post('/users/{id}', [UserController::class, 'avatar']);
Route::post('/users/password/{id}',[UserController::class,'password']);
// Falta controller ==================================================
Route::post('/faltas',[FaltaController::class,'store']);
Route::get('/faltas/{idFuncionario}/{ano}/{mes}',[FaltaController::class,'index']);