<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReservationController;

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

// Welcome page
Route::get('/', function () {
    return view('welcome');
});


// User authentication
Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

// Home
Route::get('/home',[CompanyController::class, 'index'])->name('home_page');

// Companies

Route::get('/company_console',[ReservationController::class, 'index'])->name('company_console');

Route::get('/company_console/create', [CompanyController::class, 'create'])->name('company_create');


Route::post('/company_console/save', [CompanyController::class, 'save'])->name('company_save');