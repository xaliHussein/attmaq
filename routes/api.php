<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FsqsController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\QuransController;
use App\Http\Controllers\Api\BannersController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\TeachersController;
use App\Http\Controllers\Api\SingleSessionController;
use App\Http\Controllers\Api\WebsiteSettingsController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/students/register', [StudentController::class, 'register'])->name('students.register');
Route::post('/students/login', [StudentController::class, 'login'])->name('students.login');


route::post('sendCode',[LoginController::class,'sendCode']);
route::post('register',[LoginController::class,'register']);
 route::post('login',[LoginController::class,'login']);
 route::post('get_number_phone',[LoginController::class,'getNumberPhone']);
 route::post('verify_authentication',[LoginController::class,'verifyAuthentication']);
 route::post('send_code_again',[LoginController::class,'sendCodeAgain']);
 route::post('send_code_phone',[LoginController::class,'sendCodePhone']);
 route::post('reset_password',[LoginController::class,'resetPassword']);
 route::post('confirm_verification',[LoginController::class,'confirmVerification']);


    Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(TeachersController::class)->group(function () {
        route::get('get_most_prominent_teachers','getMostProminentTeachers');
        route::get('get_available_readers_teachers','getAvailableReadersTeachers');
        route::get('get_teachers','getTeachers');
    });

        Route::controller(StudentController::class)->group(function () {
            route::post('get_student','getStudent');
            route::post('verify_phone_student','VerifyPhoneStudent');
            route::put('update_student','updateStudent');
            route::put('update_password_student','updatePasswordStudent');
            route::put('update_phone_student','updatePhoneStudent');
            route::put('update_image_student','updateImageStudent');
            route::post('get_notifications_student','getNotificationsStudent');
            route::put('seen_notifications_student','seenNotificationsStudent');

        });

        Route::controller(SessionsController::class)->group(function () {
            route::get('get_sessions','getSessions');
            route::post('create_session','createSession');
        });
        Route::controller(SingleSessionController::class)->group(function () {
            route::get('get_current_sessions','getCurrentSession');
            route::get('get_courses','getCourses');
            route::get('get_lessons','getLessons');
            route::post('create_session','createSession');
            route::get('not_available_readers','NotAvailableReaders');
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
        Route::controller(NewsController::class)->group(function () {
            route::get('get_news','getNews');
        });
        Route::controller(WebsiteSettingsController::class)->group(function () {
            route::get('get_website_settings','getWebsiteSettings');
        });

    });
