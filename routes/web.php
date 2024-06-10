<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttractieController;
use App\Http\Controllers\OpeningstijdController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccommodatiesController;
use App\Models\Openingstijd;
use App\Models\Ticket;
use App\Models\Attractie;
use App\Models\Contact;
use App\Models\Accommodaties;

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

// als een <a> tag bijvoorbeeld als href "/attracties" heeft dan gaat hij naar de AttractieController,
// daarvan de class index en hier wordt de view gereturned
Route::get('/attracties', [AttractieController::class, 'index']);
Route::get('/attracties/{attractie}', [AttractieController::class, 'show']);
Route::delete('/attracties/{attractie}', [AttractieController::class, 'destroy'])->name('delete.attractie');
Route::put('/attracties/{attractie}', [AttractieController::class, 'update'])->name('update.attractie');
Route::post('/attracties', [AttractieController::class, 'create'])->name('create.attractie');

// Openingstijden
Route::get('/openingstijden', [OpeningstijdController::class, 'index']);
Route::post('/update-openingstijden', [OpeningstijdController::class, 'update'])->name('update.openingstijden');

// Tickets
Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/update-tickets', [TicketController::class, 'update'])->name('update.tickets');

// Contact
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/verzenden', [ContactController::class, 'store']);
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('delete.contact');

// Accomodaties
Route::get('/accommodaties', [AccommodatiesController::class, 'index']);
Route::get('/accommodaties/{accommodatie}', [AccommodatiesController::class, 'show']);
Route::post('/reserveringen/{accommodatie}', [AccommodatiesController::class, 'store'])->name('reservering.store');
Route::post('/accommodaties', [AccommodatiesController::class, 'create'])->name('accommodaties.create');
Route::delete('/accommodaties/{accomodatie}', [AccommodatiesController::class, 'destroy'])->name('delete.accommodatie');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $openingstijden = Openingstijd::all();
        $tickets = Ticket::all();
        $attracties = Attractie::all();
        $contacts = Contact::all();
        $accommodaties = Accommodaties::all();
        return view('dashboard', ['openingstijden' => $openingstijden, 'tickets' => $tickets, 'attracties' => $attracties, 'contacts' => $contacts, 'accommodaties' => $accommodaties]);
    });

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
 
 
// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');