<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ImgController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResources(['brand' => BrandController::class]);
Route::apiResources(['branch' => BranchController::class]);
Route::apiResources(['img' => ImgController::class]);
Route::apiResources(['region' => RegionController::class]);
Route::apiResources(['district' => DistrictController::class]);


Route::get('/by_region/{id}', [StatisticsController::class, 'by_region'])->name('by_region');
Route::get('/by_district/{id}', [StatisticsController::class, 'by_district'])->name('by_district');
