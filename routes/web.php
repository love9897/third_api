<?php

use App\Http\Controllers\Authcontroller;
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
    return view('welcome');
});

Route::resource('user', Authcontroller::class);

Route::post('update/{id}', [Authcontroller::class, 'updateData']);

Route::get('/pagination/paginate-data', [Authcontroller::class, 'pagination']);