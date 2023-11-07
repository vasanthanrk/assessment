<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdvisoryCommittee;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OurJury;
use App\Http\Controllers\Admin\Patron;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.post');
    
});

Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');



    Route::get('companies', [CompanyController::class, 'index'])->name('admin.companies.index');
    Route::get('companies/create', [CompanyController::class, 'add'])->name('admin.companies.create');
    Route::post('companies/store', [CompanyController::class, 'store'])->name('admin.companies.store');
    Route::get('companies/edit/{company}', [CompanyController::class, 'edit'])->name('admin.companies.edit');
    Route::post('companies/update/{company}', [CompanyController::class, 'update'])->name('admin.companies.update');
    Route::get('companies/delete/{id}', [CompanyController::class, 'delete'])->name('admin.companies.delete');

    Route::get('employees', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::get('employees/create', [EmployeeController::class, 'add'])->name('admin.employees.create');
    Route::post('employees/store', [EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::get('employees/edit/{employee}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
    Route::post('employees/update/{employee}', [EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::get('employees/delete/{id}', [EmployeeController::class, 'delete'])->name('admin.employees.delete');

    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('test', [TestController::class, 'index']);
});