<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PagesController;
use App\Http\Controllers\Web\TodosController;

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
/* Route::get('/', function(){
    return View::make('pages.home'); 
}); */
/* Route::get('/', [PagesController::class, 'index']);
*/
Route::get('/', [PagesController::class, 'index']);
Route::get('/login', [PagesController::class, 'login']); 
  

Route::resource('todos', TodosController::class); 
 
/* Route::get('/contact', function(){
    return View::make('pages.contact'); 
}); */


/* Route::get('/api/v1/blade', function () {
    $data = ['Hussen', 'Reem', 'Ahmed', 'Afnan', 'Aziza'];
    return view('child');
}); */