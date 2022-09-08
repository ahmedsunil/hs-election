<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DhandaheluController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/create',[DhandaheluController::class,'store'])->name('dhandahelu.store');

Route::get('/dhandahelu', [DhandaheluController::class,'index']);


Route::resource('house', HouseController::class)->middleware(['auth']);
Route::resource('post', PostController::class)->middleware(['auth']);
Route::resource('candidate', CandidateController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
