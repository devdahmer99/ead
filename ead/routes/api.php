<?php


use App\Http\Controllers\Api\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/courses',[CourseController::class, 'index']);
Route::get('/courses/{id}',[CourseController::class, 'show']);
Route::get('/courses/{id}/modules', [\App\Http\Controllers\Api\ModuleController::class, 'index']);


Route::get('/', function () {
    return response()->json(['success' => true]);
});
