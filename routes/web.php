<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;



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

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::match(['get', 'post'],  '/create', [AdminUserController::class, 'createUser'])->name('admin.user.create');
        Route::match(['get', 'post'],  '/account/update/{id}', [AdminUserController::class, 'updateAccount'])->name('admin.user.account.update');
        Route::get('/profile/{id}', [AdminUserController::class, 'profile'])->name('admin.user.profile');
        Route::match(['get', 'post'],  '/profile/update/{id}', [AdminUserController::class, 'updateProfile'])->name('admin.user.profile.update');
        Route::delete('/delete/{id}', [AdminUserController::class, 'deleteUser'])->name('admin.user.delete');
        Route::get('/deleted', [AdminUserController::class, 'listDeletedUser'])->name('admin.user.deleted');
        Route::put('/restore/{id}', [AdminUserController::class, 'restoreUser'])->name('admin.user.restore');
        Route::get('/force-delete/{id}', [AdminUserController::class, 'forceDeleteUser'])->name('admin.user.force-delete');
        Route::match(['get', 'post'],  '/change-password/{id}', [AdminUserController::class, 'changePassword'])->name('admin.user.change-password');
    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
