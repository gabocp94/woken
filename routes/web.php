<?php

use Illuminate\Support\Facades\Route;
use App\Exports\Export;

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
    return redirect('/woken');
});
Route::get('/home', function () {
    return redirect('/woken');
});
Route::resource('/woken', 'App\Http\Controllers\WokenController');