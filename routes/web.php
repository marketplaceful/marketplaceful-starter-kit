<?php

use Marketplaceful\Models\Tag;
use Marketplaceful\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UserOrdersController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\CreateConversationController;

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
    return view('home', ['listings' => Listing::published()->orderBy('published_at', 'desc')->take(6)->get()]);
})->name('home');

Route::get('listings', [ListingController::class, 'index'])->name('listings.index');
Route::get('listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::get('listings/{listing}', [ListingController::class, 'show'])->name('listings.show');

Route::get('listings/{listing}/conversations/create', CreateConversationController::class)->name('conversations.create');
Route::get('listings/{listing}/checkout', CheckoutController::class)->name('checkout.create');

Route::get('tags', fn () => view('tags.index', ['tags' => Tag::all()]))->name('tags.index');
Route::get('tags/{tag:slug}', fn (Tag $tag) => view('tags.show', ['tag' => $tag, 'listings' => $tag->listings()->simplePaginate(9)]))->name('tags.show');

Route::get('conversations', [ConversationController::class, 'index'])->name('conversations.index');
Route::get('conversations/{conversation:uuid}', [ConversationController::class, 'show'])->name('conversations.show');

Route::get('user/orders', [UserOrdersController::class, 'index'])->name('user.orders.index');
Route::get('user/orders/{order}', [UserOrdersController::class, 'show'])->name('user.orders.show');

Route::get('user/sales', [UserSalesController::class, 'index'])->name('user.sales.index');
Route::get('user/sales/{order}', [UserSalesController::class, 'show'])->name('user.sales.show');

Route::view('about', 'about')->name('about');
