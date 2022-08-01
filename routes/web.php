<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RedeemRewardController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RewardItemController;
use App\Models\Food;
use App\Models\RewardItem;
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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');
    
    //instead
    //auth route for both 
    
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});
    
    
// // for users
// Route::group(['middleware' => ['auth', 'role:user']], function() { 
//     Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
// });

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    // Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::resource('/restaurantCategory', RestaurantCategoryController::class);
    Route::get('allRestaurant',[RestaurantController::class,'allRestaurant']);
    Route::get('allUser',[RestaurantController::class,'allUsers']);
    Route::resource("/coupon", CouponController::class);
    Route::resource('rewardItem', RewardItemController::class);
});

    
// for users
Route::group(['middleware' => ['auth', 'role:restaurant']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::resource('/restaurants',RestaurantController::class);
    Route::resource('/foodCategories', FoodCategoryController::class);
    Route::resource('/foods',FoodController::class);
    Route::resource('/apply',ApplyController::class);
    Route::resource('/redeemReward',RedeemRewardController::class);
});

require __DIR__.'/auth.php';
