<?php

use App\Http\Controllers\adminMessageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserDetailController;
use App\Models\adminMessage;





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

//route for welcome
Route::get('/', [WelcomeController::class, 'create'])->middleware(['auth'])->name('index');

//route for profile
Route::get('/profile', [profileController::class, 'create'])->middleware(['auth']);
Route::post('/profile', [profileController::class, 'store'])->middleware(['auth'])->name('profile');
Route::patch('/profile',  [profileController::class, 'update']);

//user details route
Route::get('users_details', [UserDetailController::class, 'create'])->middleware(['auth']);

// admin message route
Route::get('admin_message', [adminMessageController::class, 'create'])->middleware(['admin']);
Route::post('/store_message',  [adminMessageController::class, 'storeMessage'])->middleware(['admin']);
Route::get('/notification_message',  [adminMessageController::class, 'getNotificationMessage']);

//fallback route
Route::fallback(function(){
    return 'the page you are aspiring to view does not exist';
});
require __DIR__.'/auth.php';
