<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.dashboard');
});

// Resource Route
Route::resource('/student', StudentController::class);

Route::resource('/book', BookController::class);

Route::resource('/borrow', BorrowController::class);

Route::get('/borrow-search', [BorrowController::class, "search"]) -> name("borrow.search");

Route::post('/borrow-search-student', [BorrowController::class, 'searchStudentGet'])->name('borrow.student.get');

Route::post('/borrow-search-student', [BorrowController::class, 'searchStudent'])->name('borrow.student');

Route::get('/borrow-assign/{id}', [BorrowController::class, 'borrowAssign'])->name('borrow.assign');