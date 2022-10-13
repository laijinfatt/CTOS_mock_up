<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/', [HomeController::class, 'index']);

//Route for authenticating users' login and registration
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('agent-registration', [AuthController::class, 'agentRegistration'])->name('agent.register');
Route::get('user-registration', [AuthController::class, 'userRegistration'])->name('user.register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

//Route for editing and updating users' information
Route::get('agent-edit/{id}', [AuthController::class, 'editAgent'])->name('agent.edit');
Route::get('member-edit/{id}', [AuthController::class, 'editMember'])->name('member.edit');
Route::post('update' ,[AuthController::class,'update'])->name('user.update');
Route::get('view-agent',[AuthController::class, 'viewAgent'])->name('agent.view');
Route::get('view-member',[AuthController::class, 'viewMember'])->name('member.view');

Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Route for providing support if user forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'sendForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'sendResetPasswordForm'])->name('reset.password.post');

