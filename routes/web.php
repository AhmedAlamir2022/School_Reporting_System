<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WeekController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/profile',[UserController::class, 'Profile'])->name('profile');
    Route::post('/profile',[userController::class, 'StoreProfile'])->name('store.profile');
    Route::get('/change/password',[UserController::class, 'ChangePassword'])->name('change_password');
    Route::post('/update/password',[UserController::class, 'UpdatePassword'])->name('update.password');
    Route::get('/logout',[UserController::class, 'destroy'])->name('endlogout');

    Route::resource('Student', StudentController::class);
    Route::post('/students-import',[StudentController::class,'import'])->name('students.import');

    Route::resource('Week', WeekController::class);

    Route::resource('Report', ReportController::class);
    Route::post('/store-report',[ReportController::class,'storeReport'])->name('add.report');
    Route::get('/print/report/{id}',[ReportController::class, 'PrintReport'])->name('print.report');

    

    Route::get('/add/admin',[UserController::class,'AddAdmin'])->name('add.admin');
    Route::post('/create/admin',[UserController::class,'CreateAdmin'])->name('admin.create');
    Route::get('/alladmins',[UserController::class,'AdminAll'])->name('all.admin');
    Route::post('/delete/admin',[UserController::class, 'DeleteAdmin'])->name('delete.admin');
});

require __DIR__.'/auth.php';
