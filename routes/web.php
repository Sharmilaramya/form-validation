<?php
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('account/login',[LoginController::class,'index'])->name('account.login');
Route::get('account/register',[LoginController::class,'register'])->name('account.register');
Route::post('account/process-register',[LoginController::class,'processregister'])->name('account.processregister');

Route::post('account/authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('account/dashborad',[DashboradController::class,'index'])->name('account.dashborad');