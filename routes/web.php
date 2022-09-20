<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MovingTipsController;
use App\Http\Controllers\PackingMaterialController;
use App\Http\Controllers\PackingMethosController;
use App\Http\Controllers\ClientController;

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
Route::get('admin',function(){
    return view('backend.index');
});
Route::get('logout',function(){
    return redirect('/');
});
Route::resource('about_details',AboutController::class);
Route::resource('service_details',ServiceController::class);
Route::resource('gallery_details',GalleryController::class);
Route::resource('testimonial',TestimonialController::class);
Route::resource('client',ClientController::class);
Route::resource('moving_details',MovingTipsController::class);
Route::resource('packing_material_details',PackingMaterialController::class);
Route::resource('packing_method_details',PackingMethosController::class);
Route::resource('testimonial',TestimonialController::class);
Route::resource('valuable_client',ClientController::class);