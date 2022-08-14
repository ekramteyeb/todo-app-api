<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\PagesController;
use App\Http\Controllers\Web\TodosController;
use App\Http\Controllers\HomeController;

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
 Route::get('/', function(){
    return view('welcome'); 
});
Route::resource('/home', HomeController::class); 

/* Route::get('/', [PagesController::class, 'index']);
*/
//Route::resource('/', [PagesController::class, 'index']);
Auth::routes();
Route::resource('pages', PagesController::class);
//Route::get('/login', [PagesController::class, 'login']); 
  

Route::resource('todos', TodosController::class); 
 
/* Route::get('/contact', function(){
    return View::make('pages.contact'); 
}); */


/* Route::get('/api/v1/blade', function () {
    $data = ['Hussen', 'Reem', 'Ahmed', 'Afnan', 'Aziza'];
    return view('child');
}); */


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
