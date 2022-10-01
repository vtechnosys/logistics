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
    return view('backend.index');
});
Route::get('logout',function(){
    return redirect('/');
});
/** About **/
Route::resource('about_details',AboutController::class);
Route::resource('overview_details',OverviewController::class);
Route::resource('management_details',ManagementController::class);
Route::resource('vision_and_mission',VisionMissionController::class);
Route::resource('envisioning_details',EnvisioningController::class);
Route::resource('milestones_achievements',MilestonesController::class);
/** End About **/

Route::resource('service_details',ServiceController::class);
Route::resource('gallery_details',GalleryController::class);
Route::resource('testimonial_details',TestimonialController::class);
Route::resource('client_details',ClientController::class);
Route::resource('career_details',CareerController::class);
Route::resource('celebration_details',CelebrationController::class);

