<?php


use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix'=>'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');   

    Route::get('/create', [UserController::class, 'create'])->name('user.create');   

    Route::post('/store', [UserController::class, 'store'])->name('user.store');   

    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');

    Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/deletePhoto', [UserController::class, 'deletePhoto'])->name('user.deletePhoto');
});

Route::group(['prefix'=>'photo'], function () {
    Route::get('/', [PhotoController::class, 'index'])->name('photo.index');   

    Route::get('/create', [PhotoController::class, 'create'])->name('photo.create');   

    Route::post('/store', [PhotoController::class, 'store'])->name('photo.store');   

    Route::get('/edit', [PhotoController::class, 'edit'])->name('photo.edit');

    Route::post('/update', [PhotoController::class, 'update'])->name('photo.update');

    Route::get('/destroy', [PhotoController::class, 'destroy'])->name('photo.destroy');

    Route::get('/deletePhoto/{Photo}', [PhotoController::class, 'deletePhoto'])->name('photo.deletePhoto');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
