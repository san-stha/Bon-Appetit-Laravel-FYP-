<?php

use App\Http\Controllers\Api\ApplyApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CouponApiController;
use App\Http\Controllers\Api\FoodApiController;
use App\Http\Controllers\Api\FoodCategoryApiController;
use App\Http\Controllers\Api\GemsController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\RedeemRewardApiController;
use App\Http\Controllers\Api\RestaurantApiController;
use App\Http\Controllers\Api\ResturantCategoryApiController;
use App\Http\Controllers\Api\RewardItemApiController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RewardItemController;
use App\Models\RewardItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'logIn']);
Route::apiResource('foodCategory', FoodCategoryApiController::class);
Route::apiResource('food', FoodApiController::class);
Route::apiResource('restaurant', RestaurantApiController::class);
Route::apiResource('resturantCategory', ResturantCategoryApiController::class);

// Route::get('userGemHistory',[GemsController::class,'userGemHistory']);
Route::get('incSortedFood/{id}', [FoodApiController::class, 'getIncBubbleSortingFood']);
Route::get('decSortedFood/{id}', [FoodApiController::class, 'getDecBubbleSortingFood']);
Route::get('latLongRes', [RestaurantApiController::class, 'latLongRes']);
Route::get('resDetail/{id}', [RestaurantApiController::class, 'resDetail']);
Route::apiResource('rewardItems', RewardItemApiController::class);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('gems', GemsController::class);
    Route::get('gemsHistory', [GemsController::class, 'userGemHistory']);
    Route::get('visited', [ApplyApiController::class, 'visitedRestaurants']);
    Route::get('rateRestaurants/{id}', [RestaurantApiController::class, 'toRateRestaurants']);
    Route::apiResource('ratings', RatingController::class);
    Route::get('averageRating/{id}', [RatingController::class, 'averageRating']);
    Route::get('search/{res}', [RestaurantApiController::class, 'binarySearchRestaurant']);
    Route::apiResource('redeemRewardCust', RedeemRewardApiController::class);
    Route::post('reduceUserGem', [GemsController::class, 'reduceUsergem']);
    Route::get('rewardBought', [RedeemRewardApiController::class, 'rewardBought']);
    Route::apiResource('coupons', CouponApiController::class);
    Route::get('topFive', [RatingController::class, 'topFiveRestaurants']);
    Route::post('logout', [AuthController::class, 'logout']);
});
