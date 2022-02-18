<?php

use Illuminate\Support\Facades\Route;

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

/*  Route::get('/', function () {
    return View::make('welcome');
});  */
Route::get('/', function(){
    return View::make('pages.home'); 
}); 
/* Route::get('/contact', function(){
    return View::make('pages.contact'); 
}); */
Route::get('/login', function(){
    return View::make('pages.login'); 
}); 

/* Route::get('/api/v1/blade', function () {
    $data = ['Hussen', 'Reem', 'Ahmed', 'Afnan', 'Aziza'];
    return view('child');
}); */