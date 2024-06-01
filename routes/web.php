<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\admin\photosController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\VideosController as VideoController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\DataFeedController;


/**users controllers */
use App\Http\Controllers\photoController;
use App\Http\Controllers\pricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Verifyuser;
use App\Http\Controllers\videosController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



/**verify route */

Route::get('home', [Verifyuser::class, 'index']);



/**users routes */

Route::get('/', function () {
    return view('index');
});


Route::resource('pricing', pricingController::class);
Route::resource('videos', videosController::class);
Route::resource('photos', photoController::class);
Route::resource('contact', contactController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



/**admin routes */


Route::redirect('/admin', 'login');

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /**admin photos routes */

    Route::get('/photos', [photosController::class, 'index'])->name('admin.photos');
    Route::get('/new/photos', [photosController::class, 'create'])->name('admin/new/photos');
    Route::put('/store/photo', [photosController::class, 'store'])->name('store/photo');
    Route::get('/edit/photo/{id}', [photosController::class, 'edit'])->name('edit/photo');
    Route::post('/photo/{id}', [photosController::class, 'update'])->name('update/photo');
    Route::delete('destroy/photo/{id}', [photosController::class, 'destroy'])->name('destroy/photo');

/**admin videos routes */
    Route::get('/videos', [VideoController::class, 'index'])->name('admin/videos');
    Route::get('/new/videos', [VideoController::class, 'create'])->name('admin/new/videos');
    Route::put('/store/videos', [VideoController::class, 'store'])->name('admin/store/videos');
    Route::get('/edit/videos/{id}', [VideoController::class, 'edit'])->name('edit/videos');
    Route::post('/videos/{id}', [VideoController::class, 'update'])->name('update/videos');
    Route::delete('destroy/videos/{id}', [VideoController::class, 'destroy'])->name('destroy/video');

    /**admin users route */
    Route::get('/users', [UserController::class, 'index'])->name('admin/users');
    Route::get('edit/user/{id}', [UserController::class, 'edit'])->name('edit/user');
    Route::post('/user/{id}', [UserController::class, 'update'])->name('update/user');
    Route::delete('destroy/user/{id}', [UserController::class, 'destroy'])->name('destroy/user');

});
