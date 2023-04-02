<?php

use App\Http\Controllers\Admin\Maincontroller;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;
use Psy\TabCompletion\Matcher\KeywordsMatcher;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//    return view('welcome');
// });

Route::get('/admin',[Maincontroller::class, 'index'])->name('admin.Dashboard');
Route::get('/admin/services',[Maincontroller::class, 'service_view'])->name('admin.service_view');
Route::get('/admin/staffs',[Maincontroller::class, 'staffs_view'])->name('admin.staffs_view');
Route::post('/admin/services/edit/',[ServiceController::class, 'service_update'])->name('admin.service_update');
Route::get('/admin/services/delete/{id}',[ServiceController::class, 'service_delete'])->name('admin.service_delete','{id}');
Route::post('/admin/services',[ServiceController::class, 'service_create'])->name('admin.service_create');
Route::get('/admin/services/check_data',[Maincontroller::class, 'service_chk_single_data'])->name('admin.service_chk_single_data');
Route::post('/admin/staffs',[StaffController::class, 'staffs_create'])->name('admin.staffs_create');
