<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pages\BlacklistController;
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
Route::get('show-agent',[AuthController::class, 'showAgent'])->name('agent.show'); 
// Route::get('show-newer-agent-first',[AuthController::class, 'displayNewerAgent'])->name('agent.show.id.desc');
// Route::get('show-agent-alphabetically',[AuthController::class, 'displayAgentAlphabetically'])->name('agent.show.name');
// Route::get('show-agent-alphabetically-desc',[AuthController::class, 'displayAgentAlphabeticallyDesc'])->name('agent.show.name.desc');
Route::get('show-member',[AuthController::class, 'showMember'])->name('member.show'); 
// Route::get('show-newer-member-first',[AuthController::class, 'displayNewerMember'])->name('member.show.id.desc');
// Route::get('show-member-alphabetically',[AuthController::class, 'displayMemberAlphabetically'])->name('member.show.name');
// Route::get('show-member-alphabetically-desc',[AuthController::class, 'displayMemberAlphabeticallyDesc'])->name('member.show.name.desc');
Route::get('view-agent',[AuthController::class, 'showAgent'])->name('agent.view');
Route::get('view-member',[AuthController::class, 'showMember'])->name('member.view');
Route::get('delete-agent/{id}',[AuthController::class, 'deleteAgent'])->name('agent.delete');
Route::get('delete-member/{id}',[AuthController::class, 'deleteMember'])->name('member.delete');
Route::get('search-agent',[AuthController::class, 'searchAgent'])->name('agent.search');
Route::get('search-member',[AuthController::class, 'searchMember'])->name('member.search');

//Route for handling matter of blacklisting
Route::get('add-to-blacklist',[BlacklistController::class, 'addToBlacklist'])->name('add.to.blacklist');
Route::post('post-blacklist',[BlacklistController::class, 'add'])->name('blacklist.post');
Route::get('view-blacklist',[BlacklistController::class, 'viewBlacklist'])->name('blacklist.view');
// Route::get('view-blacklist-newly-added-first',[BlacklistController::class, 'displayNewerFirst'])->name('blacklist.view.id.desc');
// Route::get('view-blacklist-alphabetically-first',[BlacklistController::class, 'displayAlphabetically'])->name('blacklist.view.name');
// Route::get('view-blacklist-alphabetically-desc',[BlacklistController::class, 'displayAlphabeticallyDesc'])->name('blacklist.view.name.desc');
Route::get('edit-blacklisted-person/{id}',[BlacklistController::class, 'edit'])->name('edit.blacklist');
Route::post('update-blacklist',[BlacklistController::class, 'update'])->name('blacklist.update');
Route::get('delete-blacklisted-person/{id}',[BlacklistController::class, 'delete'])->name('blacklist.delete');
Route::get('search-blacklist',[BlacklistController::class, 'searchBlacklist'])->name('blacklist.search');

//Change Password
Route::get('change-password', [AuthController::class, 'editPassword'])->name('password.change');
Route::post('update-password',[AuthController::class, 'updatePassword'])->name('password.update');

Route::get('profile-edit', [AuthController::class, 'editProfile'])->name('profile.edit');
Route::post('update-profile',[AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('profile', [AuthController::class, 'profile'])->name('profile.view');  
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('about-ctos', [AuthController::class, 'about'])->name('about.us'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Route for providing support if user forget password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'sendForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'sendResetPasswordForm'])->name('reset.password.post');

