<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\WelcomeController;


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

require __DIR__.'/auth.php';
