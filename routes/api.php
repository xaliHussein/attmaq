<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FsqsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\QuransController;
use App\Http\Controllers\Api\BannersController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\TeachersController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/students/settings', [StudentController::class, 'settings'])->name('students.settings');
    Route::get('/teachers', [StudentController::class, 'teachers'])->name('students.teachers');
    Route::get('/notifications', [StudentController::class, 'notifications'])->name('students.notifications');
    Route::get('/banners', [StudentController::class, 'banners'])->name('students.banners');
    Route::get('/news', [StudentController::class, 'news'])->name('students.news');
    Route::get('/faqs', [StudentController::class, 'faqs'])->name('students.faqs');
});

Route::post('/students/register', [StudentController::class, 'register'])->name('students.register');
Route::post('/students/login', [StudentController::class, 'login'])->name('students.login');


route::post('sendCode',[LoginController::class,'sendCode']);
route::post('register',[LoginController::class,'register']);
 route::post('login',[LoginController::class,'login']);
 route::post('get_number_phone',[LoginController::class,'getNumberPhone']);
 route::post('verify_authentication',[LoginController::class,'verifyAuthentication']);
 route::post('send_code_again',[LoginController::class,'sendCodeAgain']);
//  route::post('sendCode',[LoginController::class,'sendCode']);

//  Route::middleware(['auth:api'])->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(TeachersController::class)->group(function () {
        route::get('get_most_prominent_teachers','getMostProminentTeachers');
        route::get('get_teachers','getTeachers');
    });

        Route::controller(StudentController::class)->group(function () {
            route::post('add_request','addRequest');
            route::post('get_student','getStudent');
            route::post('verify_phone_student','VerifyPhoneStudent');
            route::put('update_student','updateStudent');
            route::put('update_password_student','updatePasswordStudent');
            route::put('update_phone_student','updatePhoneStudent');
            route::put('update_image_student','updateImageStudent');

        });

        Route::controller(SessionsController::class)->group(function () {
            route::get('get_sessions','getSessions');
        });

        Route::controller(FsqsController::class)->group(function () {
            route::get('get_faqs','getFaqs');
        });
        Route::controller(BannersController::class)->group(function () {
            route::get('get_banners','getBanners');
        });

        Route::controller(QuransController::class)->group(function () {
            route::get('get_books','getBooks');
            route::post('download_pdf','downloadPdf');
        });
    });
