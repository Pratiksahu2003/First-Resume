<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\KYCController;
use App\Http\Controllers\user\UserController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
// Route::post('/auth', [AuthController::class, 'auth']);

Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/submit', [AuthController::class, 'submit']);


Route::middleware(['user'])->group(function () {


    Route::prefix('user')->group(function () {
        Route::get('/kyc', [KYCController::class, 'index']);

        // Kyc 
        Route::get('/home', [UserController::class, 'home']);
        Route::post('/kyc/submit', [KYCController::class, 'submit'])->name('kyc.submit');
        // Notifications
        Route::get('/Notifications/{id}', [HomeController::class, 'notifications'])->name('notification.show');

        // Profile Route 
        Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');
        Route::get('/View-profile', [ProfileController::class,'view'])->name('profile.view');
        Route::get('/View-setting', [ProfileController::class,'setting'])->name('profile.setting');


        Route::post('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
        Route::post('/profile/update',[ProfileController::class,'store'] )->name('profile.update');

        // Resume Route 
        Route::get('/Personal-Deaitals',[ResumeController::class,'ResumePersonalDeaitals'] )->name('resume.personal');
        Route::post('/Personal-Deaitals-Save',[ResumeController::class,'ResumePersonalDeaitalsSave'] )->name('resume.personal.save');

        Route::get('/Education-Deaitals',[ResumeController::class,'ResumeEducationDeaitals'] )->name('resume.Education');
        Route::post('/Education-Deaitals-Save',[ResumeController::class,'ResumeEducationDeaitalsSave'] )->name('resume.Education.save');
        Route::post('/education/update', [ResumeController::class, 'ResumeEducationDeaitalsupdate'])->name('resume.Education.update');
        Route::delete('/education/delete/{id}', [ResumeController::class, 'ResumeEducationDeaitalsdestroy'])->name('resume.Education.delete');

    });
});

Auth::routes();



Route::middleware(['admin'])->group(function () {


    Route::prefix('admin')->group(function () {
        Route::get('/home', [HomeController::class, 'admin_home']);
        // KYC Routes 
        Route::get('/KYC-Complete', [KYCController::class, 'kyc_complete'])->name('kyc.complete');
        Route::get('/KYC-Pending', [KYCController::class, 'kyc_pending'])->name('kyc.pending');
        Route::get('show/{id}/{status}', [KYCController::class, 'kyc_show'])->name('kyc.show');
        Route::get('update/{id}/{status}', [KYCController::class, 'kyc_update'])->name('kyc.update');
    });
});
