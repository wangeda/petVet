<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;

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







Route::get('lang/{lang}', function ($lang){
	session(['lang'=> $lang]);
	return \Redirect::back();	
})->where([
	'lang' => 'en|es'
]);



Auth::routes(config('auth.options') ?? []);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);
Route::get('settings/profile', [App\Http\Controllers\Settings\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('settings/profile', [App\Http\Controllers\Settings\ProfileController::class, 'update'])->name('profile.update');

Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);



Route::resource('/pets', PetController::class);
Route::resource('/customers', CustomerController::class);
Route::resource('/employees', EmployeeController::class);




Route::resource('/products', ProductsController::class);
Route::resource('/categories', CategoryController::class);
