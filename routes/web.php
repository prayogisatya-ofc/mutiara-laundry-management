<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    Route::get('/auth/login', [AuthController::class, 'index'])->name('login_views');
    Route::post('/auth/login/logedin', [AuthController::class, 'logedin'])->name('login_handle');
});

Route::middleware('auth')->group(function(){
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout_handle');

    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/packages', [PackageController::class, 'index'])->name('package_list');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('package_create');
    Route::post('/packages/store', [PackageController::class, 'store'])->name('package_store');
    Route::delete('/packages/{package}', [PackageController::class, 'destroy'])->name('package_destroy');
    Route::get('/packages/{package}', [PackageController::class, 'edit'])->name('package_edit');
    Route::post('/packages/{package}', [PackageController::class, 'update'])->name('package_update');

    Route::get('/members', [MemberController::class, 'index'])->name('member_list');
    Route::get('/members/create', [MemberController::class, 'create'])->name('member_create');
    Route::post('/members/store', [MemberController::class, 'store'])->name('member_store');
    Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('member_destroy');
    Route::get('/members/{member}', [MemberController::class, 'edit'])->name('member_edit');
    Route::post('/members/{member}', [MemberController::class, 'update'])->name('member_update');

    Route::get('/users', [UserController::class, 'index'])->name('user_list');
    Route::get('/users/create', [UserController::class, 'create'])->name('user_create');
    Route::post('/users/store', [UserController::class, 'store'])->name('user_store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user_destroy');
    Route::get('/users/{user}', [UserController::class, 'edit'])->name('user_edit');
    Route::post('/users/{user}', [UserController::class, 'update'])->name('user_update');
    
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction_list');
    Route::get('/transactions/print', [TransactionController::class, 'print_list'])->name('transaction_print_list');
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transaction_destroy');
    Route::get('/transactions/{transaction}', [TransactionController::class, 'edit'])->name('transaction_edit');
    Route::post('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transaction_update');
    Route::get('/transactions/print/{transaction}', [TransactionController::class, 'print_single'])->name('transaction_print_single');

    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier_list');
    Route::get('/cashier/get-packages', [CashierController::class, 'get_packages'])->name('cashier_get_packages');
    Route::get('/cashier/get-members', [CashierController::class, 'get_members'])->name('cashier_get_members');
    Route::post('/cashier/add-member', [CashierController::class, 'add_member'])->name('cashier_add_member');
    Route::post('/cashier/checkout', [CashierController::class, 'checkout'])->name('cashier_checkout');
});
