<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostelEnqueries;

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
Route::get('enquiry', [HomeController::class,'enqueryForm']);
Route::post('submit-inquery-form', [HomeController::class,'submitInqueryForm']);
Route::get('success', [HomeController::class,'success']);
Route::get('get-hostel-enqueries-for-oops-team', [HostelEnqueries::class,'getEnqueries']);
Route::get('get-distance', [HomeController::class,'getDistanceOfTwoLocation']);
Route::get('calculate-audio-duration', [HomeController::class,'audioLength']);
Route::get('add-user', [HomeController::class,'adduser']);
Route::post('save-add-user', [HomeController::class,'saveAdduser']);
Route::get('user-list', [HomeController::class,'getUser']);
Route::get('edit-user', [HomeController::class,'editUser']);
Route::get('delete-user', [HomeController::class,'deleteUser']);
Route::post('update-user', [HomeController::class,'updateUser']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
