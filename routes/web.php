<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Models\User;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', function () {
    $user = User::all();
    $auth_user = Auth::check();
    return view('welcome', ['users' => $user, 'auth'=>$auth_user]);
})->middleware(['auth'])->name('index');

Route::get('/profile', [profileController::class, 'create'])->middleware(['auth']);
Route::post('/profile', [profileController::class, 'store'])->middleware(['auth'])->name('profile');
Route::patch('/profile',  [profileController::class, 'update']);

require __DIR__.'/auth.php';
