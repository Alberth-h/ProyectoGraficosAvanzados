<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalesController as AnimalesController;
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

Route::get('/animales', [AnimalesController::class,'index'])->name('animales.index');
Route::get('/animales/create', [AnimalesController::class,'create'])->name('animales.create');
Route::post('/animales/store', [AnimalesController::class,'store'])->name('animales.store');
Route::get('/animales/{id}/edit', [AnimalesController::class,'edit'])->name('animales.edit');
Route::put('/animales/{id}/update', [AnimalesController::class,'update'])->name('animales.update');
Route::delete('/animales/{id}/destroy', [AnimalesController::class,'destroy'])->name('animales.destroy');