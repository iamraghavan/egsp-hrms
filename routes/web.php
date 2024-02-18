<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\BrowserInfoController;

// Get Methods
Route::middleware('guest')->group(function () {
    Route::get('/', [PageController::class, 'login_page'])->name('login');
    Route::post('/verify/login', [PageController::class, 'verifyLogin']);
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('pages.dashboard');
    Route::get('/add/add-employee', [PageController::class, 'add_employee'])->name('pages.add-employee');
    Route::post('/add/employee', [EmployeeController::class, 'addEmployee']);
    Route::get('/employee/calculate-salary', [PageController::class, 'calculate_salary'])->name('pages.calculate');

});



Route::get('/get-faculty-names', [EmployeeController::class, 'getFacultyNames'])->name('get.faculty.names');
Route::get('/get-employee-details', [EmployeeController::class, 'getEmployeeDetails'])->name('get.employee.details');
// In routes/web.php
// Route::post('/add/employee', [EmployeeController::class, 'store']);
