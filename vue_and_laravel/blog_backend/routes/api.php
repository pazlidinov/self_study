<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FilterArticleController;
use App\Http\Controllers\ReplayCommentsController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:sanctum')->group(function () {});

Route::apiResources(['user' => UserController::class]);
Route::apiResources(['category' => CategoryController::class]);
Route::apiResources(['article' => ArticleController::class]);
Route::apiResources(['comments' => CommentsController::class]);
Route::apiResources(['replaycomments' => ReplayCommentsController::class]);


Route::get('/random_articles', [FilterArticleController::class, 'random_articles'])->name('random_articles');
Route::get('/main_articles', [FilterArticleController::class, 'main_articles'])->name('main_articles');
Route::get('/whatnew', [FilterArticleController::class, 'whatnew'])->name('whatnew');
Route::get('/by_category/{id}', [FilterArticleController::class, 'by_category'])->name('by_category');
Route::get('/by_author/{id}', [FilterArticleController::class, 'by_author'])->name('by_author');


Route::post('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
