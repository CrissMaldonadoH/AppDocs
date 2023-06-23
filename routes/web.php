<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentoController;
use App\Models\Documento;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('documentos', DocumentoController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [DocumentoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [DocumentoController::class, 'index'])->name('home');
});
