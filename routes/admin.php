<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\GuestQuestionController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\PaymentWayController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HouseOwnersController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    /* ------------------------------------- Auth Routes --------------------------------- */
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.post');
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
    /* ------------------------------------- Admin Dashboard --------------------------------- */
    Route::group(['middleware' => ['auth:admin,instructor', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');


        /* ------------------------------------- Admin Routes --------------------------------- */
        Route::resource('admins', AdminController::class);
        Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {
            Route::get('data/datatables', [AdminController::class, 'datatable'])->name('datatable');
            Route::post('activate/{id}', [AdminController::class, 'activate'])->name('active');
            Route::post('bluck/delete', [AdminController::class , 'bluckDestroy'])->name('bluck_delete');
        });
        /* ------------------------------------- Admin Routes --------------------------------- */

        /* ------------------------------------- HouseOwner Routes --------------------------------- */
        Route::resource('house_owners', HouseOwnersController::class);
        Route::group(['prefix' => 'house_owners', 'as' => 'house_owners.'], function () {
            Route::get('data/datatables', [HouseOwnersController::class, 'datatable'])->name('datatable');
            Route::post('activate/{id}', [HouseOwnersController::class, 'activate'])->name('activate');
            Route::post('bluck/delete', [HouseOwnersController::class, 'bulkDestroy'])->name('bulk_delete');
        });
        /* ------------------------------------- HouseOwner Routes --------------------------------- */


        Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
            Route::post('media/store', [FileController::class , 'storeMedia'])->name('store');
            Route::post('media/{filename}/destroy', [FileController::class , 'destroyMedia'])->name('destroy');
        });
    });

});
