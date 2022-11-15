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
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\VisionMissionController;
use App\Http\Controllers\EnvisioningController;
use App\Http\Controllers\MilestonesController;
use App\Http\Controllers\WarehousingController;
use App\Http\Controllers\TranspportationController;
use App\Http\Controllers\LiquidController;
use App\Http\Controllers\FreightController;
use App\Http\Controllers\DryPortsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CelebrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontController;
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
/** Backend Routes **/
Route::get('admin',function(){
    return view('login');
});

Route::post('logincheck',[LoginController::class,'logincheck']);
Route::get('index',[LoginController::class,'indexpage']);
Route::get('logout',[LoginController::class,'logoutUser']);
/** About **/
Route::resource('about_details',AboutController::class)->middleware('checkType');
Route::resource('overview_details',OverviewController::class);
Route::resource('management_details',ManagementController::class);
Route::resource('vision_and_mission',VisionMissionController::class);
Route::resource('envisioning_details',EnvisioningController::class);
Route::resource('milestones_achievements_details',MilestonesController::class);
/** End About **/

Route::resource('service_details',ServiceController::class);
Route::resource('gallery_details',GalleryController::class);
Route::resource('testimonial_details',TestimonialController::class);
Route::resource('client_details',ClientController::class);
Route::resource('career_details',CareerController::class);
Route::resource('celebration_details',CelebrationController::class);
Route::get('contact_details',[ServiceController::class,'contact_details']);
Route::delete('contact_remove/{id}',[ServiceController::class,'contact_remove']);
/** Routes For Frontend **/
Route::get('/',[FrontController::class,'indexpage']);
Route::get('about',[FrontController::class,'aboutpage']);
Route::get('service',[FrontController::class,'servicepage']);
Route::get('services_details/{id}',[FrontController::class,'service_details']);
Route::get('gallery',[FrontController::class,'gallery']);
Route::get('people_corner',[FrontController::class,'people_corner']);
Route::get('about_ALS',[FrontController::class,'about_ALS']);
Route::get('management',[FrontController::class,'management']);
Route::get('vision_mission',[FrontController::class,'vision_mission']);
Route::get('envisioning_the_future',[FrontController::class,'envisioning_the_future']);
Route::get('milestones_achievements',[FrontController::class,'milestones_achievements']);
Route::get('contact',[FrontController::class,'contact']);
Route::post('contactstore',[FrontController::class,'contactstore']);
Route::post('search',[FrontController::class,'search']);