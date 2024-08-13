<?php 
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ForgetPasswordController;

/**********************************************
 ----------------------------------------------
 ----------------------------------------------


 ------------------AUTH ROUTE------------------


 ----------------------------------------------
 ----------------------------------------------
 **********************************************/

 Route::get('admin/login',[AuthController::class,'admin_login'])->name('admin.login');
 Route::post('admin/login', [AuthController::class, 'admin_login_post'])->name('admin.login.submit');



 Route::get('logout', [AuthController::class, 'logout'])->name('logout');

 Route::get('register',[AuthController::class,'register'])->name('register');
 Route::post('register', [AuthController::class, 'register_submit'])->name('register.submit');

 Route::get('login',[AuthController::class,'login'])->name('login');
 Route::post('login', [AuthController::class, 'user_login'])->name('login.submit');




 // forget password 

Route::get('forget-password',[ForgetPasswordController::class,'forget_password'])->name('forget.password');
Route::post('forget-password/submit',[ForgetPasswordController::class,'forget_password_submit'])->name('forget.password.submit');
Route::post('reset-password/otp',[ForgetPasswordController::class,'verify_otp'])->name('reset.passeord');
Route::post('reset-password/submit',[ForgetPasswordController::class,'reset_password_submit'])->name('reset.passeord.submit');
 




