<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyApi;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("data", [dummyApi::class, 'getData']);
Route::get("list/{id?}", [UserController::class, 'list']);
Route::post("add", [UserController::class, 'add']);
Route::put("update", [UserController::class, 'update']);
Route::get("search/{name}", [UserController::class, 'search']);
Route::delete("delete/{id}", [UserController::class, 'delete']);
Route::post("validated-save", [UserController::class, 'testData']);
Route::apiResource("feedback", FeedbackController::class);
Route::post("upload", [FileController::class, 'upload']);