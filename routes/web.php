<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('shop.cart');
Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
Route::get('/product-category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');

Route::get('/search', SearchComponent::class)->name('product.search');

Route::get('/wishlist', WishlistComponent::class)->name('shop.wishlist');


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware('auth', 'authadmin')->group(function () {
    Route::get('/admin/dashboard', App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');
});




require __DIR__.'/auth.php';
