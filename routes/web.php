<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractieController;
use App\Http\Controllers\OpeningstijdController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;

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

// Default route voor de webpagina
Route::get('/', function () {
    return view('welcome');
});

// als een <a> tag bijvoorbeeld als href "/aatracties" heeft dan gaat hij naar de AttractieController,
// daarvan de class index en hier wordt de view gereturned
Route::get('/attracties', [AttractieController::class, 'index']);
Route::get('/openingstijden', [OpeningstijdController::class, 'index']);
Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
});
// Routes voor de formulieren verzenden
Route::post('/tickets/store', [TicketController::class, 'store']);
Route::post('/contact/verzenden', [ContactController::class, 'store']);


