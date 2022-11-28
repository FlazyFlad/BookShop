<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\EmployeeController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('/books', BookController::class, array("as" => "api"));

Route::post('/register', [AuthApiController::class, 'register']);
Route::get('emps', [EmployeeController::class, 'index'])->middleware(['auth:api', 'isAdmin']);
Route::post('/login', [AuthApiController::class, 'login']);

