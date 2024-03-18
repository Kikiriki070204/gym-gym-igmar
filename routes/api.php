<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;

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

Route::post('register',[AuthController::class,'register']);
Route::get('activate/{user}',[AuthController::class,'activate'])->name('activate')->middleware('signed');


//Auth
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('verify/{id}',[AuthController::class,'verify'])->name('verify');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

//User
Route::post('rol/{id}',[UserController::class,'role'])->name('rol');
Route::get('profile/{id}',[UserController::class,'profile'])->name('perfil');

//Cliente
Route::get('clientes',[ClienteController::class,'index'])->name('clientes');
Route::post('cliente/{id}',[ClienteController::class,'store'])->name('cliente_store');

//Empleado
Route::get('empleados',[EmpleadoController::class,'index'])->name('index');
Route::post('empleado/{id}',[EmpleadoController::class,'store'])->name('empleado_store');
Route::post('empleado/servicio',[EmpleadoController::class,'servicio'])->name('empleado_servicio');

//Citas
Route::get('citas',[CitaController::class,'index'])->name('citas');
Route::get('agendar/{id}',[CitaController::class,'vista_agendar'])->name('agendar');
Route::post('cita/store/{id}',[CitaController::class,'store'])->name('cita_store');
Route::delete('cita/delete',[CitaController::class,'destroy'])->name('cita_delete');
Route::get('citas/{id}',[CitaController::class,'index_empleado'])->name('citas_empleado');

