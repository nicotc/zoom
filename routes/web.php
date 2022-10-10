<?php

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    return redirect('/login');
});

Auth::routes( );


Route::middleware(['auth'])->group(function () {
    Route::resource('zoom', App\Http\Controllers\ZoomController::class);
});