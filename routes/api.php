<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
     // Projects routes
     Route::get('/projects', [AuthController::class, 'index']);
     Route::get('/projects/{project}', [AuthController::class, 'show']);
     Route::post('/projects', [AuthController::class, 'store']);
     Route::put('/projects/{project}', [AuthController::class, 'update']);
     Route::delete('/projects/{project}', [AuthController::class, 'destroy']);
 

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
       
   });


Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/login', [AuthController::class, 'login']);

// Remove one of the following lines, as they are duplicate
Route::post('/loginwithgoogle', [AuthController::class, 'handleGoogleCallback']);

Route::post('/passwordreset', [AuthController::class, 'passwordReset']);
Route::post('/newpassword', [AuthController::class, 'newPassword']);
