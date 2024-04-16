<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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

Route::apiResources(['article'=>ArticleController::class]);
Route::get('/random_articles', [ArticleController::class, 'random_articles'])->name('random_articles');
Route::get('/article_by_category/{id}', [ArticleController::class, 'article_by_category'])->name('article_by_category');

Route::apiResources(['category'=>CategoryController::class]);
