<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comments;
use App\Models\ReplayComments;
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

Route::middleware('auth:sanctum')->group(function () {});

Route::apiResources(['user' => UserController::class]);
Route::apiResources(['category' => Category::class]);
Route::apiResources(['article' => Article::class]);
Route::apiResources(['comments' => Comments::class]);
Route::apiResources(['replaycomments' => ReplayComments::class]);




Route::post('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/login', [UserAuthController::class, 'login'])->name('login');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');
