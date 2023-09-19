<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\CommentController;


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


Route::match(['get', 'post'],  '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'],  '/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth/{id}', [AuthController::class, 'getAuth'])->name('auth');
    Route::middleware('check.role')->group(function () {
        Route::group(['prefix' => 'admin'], function () {
            Route::group(['prefix' => 'laravel-filemanager'], function () {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            })->name('laravel-filemanager');

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

            Route::group(['prefix' => '/post'], function () {
                Route::get('/', [AdminPostController::class, 'index'])->name('admin.post.index');
                Route::match(['get', 'post'],  '/create', [AdminPostController::class, 'createPost'])->name('admin.post.create');
                Route::get('/{slug}', [AdminPostController::class, 'detailPost'])->name('admin.post.detail');
                Route::match(['get', 'post'],  '/update/{id}', [AdminPostController::class, 'updatePost'])->name('admin.post.update');
                Route::delete('/delete/{id}', [AdminPostController::class, 'deletePost'])->name('admin.post.delete');
                Route::put('/accept', [AdminPostController::class, 'acceptPost'])->name('admin.post.accept');
                Route::put('/reject', [AdminPostController::class, 'rejectPost'])->name('admin.post.reject');
            });

            Route::group(['prefix' => '/category'], function () {
                Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');
                Route::match(['get', 'post'],  '/create', [AdminCategoryController::class, 'createCategory'])->name('admin.category.create');
                Route::match(['get', 'post'],  '/update/{id}', [AdminCategoryController::class, 'updateCategory'])->name('admin.category.update');
                Route::get('/delete/{id}', [AdminCategoryController::class, 'deleteCategory'])->name('admin.category.delete');
            });

            Route::group(['prefix' => '/banner'], function () {
                Route::get('/', [AdminBannerController::class, 'index'])->name('admin.banner.index');
                Route::match(['get', 'post'],  '/create', [AdminBannerController::class, 'createBanner'])->name('admin.banner.create');
                Route::match(['get', 'post'],  '/update/{id}', [AdminBannerController::class, 'updateBanner'])->name('admin.banner.update');

                Route::delete('/delete/{id}', [AdminBannerController::class, 'deleteBanner'])->name('admin.banner.delete');

                Route::put('/active', [AdminBannerController::class, 'activeBanner'])->name('admin.banner.active');
                Route::put('/deactive', [AdminBannerController::class, 'deactiveBanner'])->name('admin.banner.deactive');
            });

            Route::group(['prefix' => '/comment'], function () {
                Route::get('/', [AdminCommentController::class, 'index'])->name('admin.comment.index');
                Route::get('/delete/{id}', [AdminCommentController::class, 'deleteComment'])->name('admin.comment.delete');
            });
        });
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => '/post'], function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/{slug}', [PostController::class, 'detailPost'])->name('post.detail');
    Route::match(['get', 'post'],  '/create', [PostController::class, 'createPost'])->name('post.create')->middleware('auth');
    Route::match(['get', 'post'],  '/update/{id}', [PostController::class, 'updatePost'])->name('post.update')->middleware('auth');
});

Route::group(['prefix' => '/comment'], function () {
    Route::post('/new', [CommentController::class, 'newComment'])->name('comment.new');
});
Route::get('/back', function () {
    return redirect()->back();
})->name('back');
