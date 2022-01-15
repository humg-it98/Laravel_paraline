<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\EmployeesController;


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
Route::get('/', [AdminController::class, 'loginAdmin']);
Route::get('/login','AdminController@login')->name('login');
Route::post('/check',[AdminController::class,'postLoginAdmin'])->name('check');
Route::get('/home','AdminController@index');
Route::get('/sent-mail','MailController@sent_mail');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'loginAdmin'])->name('login');
    Route::post('/check', [AdminController::class, 'postLoginAdmin'])->name('check');
    Route::get('/permission', [AdminController::class, 'permission'])->name('permission');
    Route::post('/permission-add', [AdminController::class, 'permission_add'])->name('permission_add');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});

Route::prefix('group')->name('group.')->group(function() {
    Route::get('/', [GroupsController::class, 'index'])->name('index');
    Route::get('/search', [GroupsController::class, 'search'])->name('search');
    Route::get('/create', [GroupsController::class, 'create'])->name('create');
    Route::post('/confirm', [GroupsController::class, 'confirm'])->name('confirm');
    Route::post('/store', [GroupsController::class, 'store'])->name('store');
    Route::get('/show/{id}', [GroupsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [GroupsController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [GroupsController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [GroupsController::class, 'destroy'])->name('destroy');
});

Route::prefix('team')->name('team.')->group(function() {
    Route::get('/', [TeamsController::class, 'index'])->name('index');
    Route::get('/search', [TeamsController::class, 'search'])->name('search');
    Route::get('/create', [TeamsController::class, 'create'])->name('create');
    Route::post('/confirm', [TeamsController::class, 'confirm'])->name('confirm');
    Route::post('/store', [TeamsController::class, 'store'])->name('store');
    Route::get('/show/{id}', [TeamsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [TeamsController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TeamsController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [TeamsController::class, 'destroy'])->name('destroy');
});


Route::prefix('employee')->name('employee.')->group(function() {
    Route::get('/', [EmployeesController::class, 'index'])->name('index');
    Route::get('/search', [EmployeesController::class, 'search'])->name('search');
    Route::get('/create', [EmployeesController::class, 'create'])->name('create');
    Route::post('/confirm', [EmployeesController::class, 'confirm'])->name('confirm');
    Route::post('/store', [EmployeesController::class, 'store'])->name('store');
    Route::get('/show/{id}', [EmployeesController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [EmployeesController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [EmployeesController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [EmployeesController::class, 'destroy'])->name('destroy');
});
