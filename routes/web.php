<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Models\CourseCategory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::resource('courses',CourseController::class);
    // ->middleware('auth','Check')
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/',[AdminController::class ,'index'])->name('index');
        // Route::resource('categories',CategoryController::class);
        // Route::resource('products',ProductController::class);
    });

    Route::view('/', 'welcome');
    // Route::view('/', 'courses.index');


    Route::view('dashboard', 'dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    require __DIR__.'/auth.php';

});
