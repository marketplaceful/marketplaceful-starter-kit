<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\CreateConversationController;
use App\Http\Controllers\ListingController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::get('listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

Route::get('listings/{listing}/conversations/create', CreateConversationController::class)->name('conversations.create');

Route::get('conversations', [ConversationController::class, 'index'])->name('conversations.index');
Route::get('conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');

Route::view('about', 'about')->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
