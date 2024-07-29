<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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
Route::post('conatct-us',[ApiController::class,'contactUs']);
Route::get('blog',[ApiController::class,'getBlog']);
Route::post('blog-details',[ApiController::class,'getBlogDetails']);
Route::post('email-send',[ApiController::class,'sendEmail']);
Route::get('testimonials',[ApiController::class,'getTestimonials']);
Route::get('logo',[ApiController::class,'getLogo']);
Route::get('client-total',[ApiController::class,'clientTotal']);
