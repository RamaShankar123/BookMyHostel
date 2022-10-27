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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
