<?php

use App\Http\Controllers\ConstanciasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ResourcesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/participantes/subir', [ExcelController::class, 'upload'])->name('participantes.subir');
Route::post('/resources/plantilla', [ResourcesController::class, 'template'] )->name('resources.plantilla');
Route::get('/constancia/template/v1', [ConstanciasController::class, 'template1']);
Route::get('/constancia/template/v2', [ConstanciasController::class, 'template2']);
Route::post('/constancias/crear', [ConstanciasController::class, 'generate'])->name('constancias.crear');