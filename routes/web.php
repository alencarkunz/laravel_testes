<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

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
  //return view('welcome');
  return redirect('pessoas');
})->name('home');

//Route::get('/pessoas/teste', [PessoaController::class, 'teste']);
Route::resource('/pessoas', PessoaController::class)
  ->names('pessoa')
  ->except(['show']);
