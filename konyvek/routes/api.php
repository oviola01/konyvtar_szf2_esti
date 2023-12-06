<?php

use App\Http\Controllers\CopyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;
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

Route::apiResource('/users', UserController::class);
Route::apiResource('/copys', CopyController::class);
Route::apiResource('/books', BookController::class);
Route::get('/lendings', [LendingController::class, 'index']);
Route::get('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'show']);
//Route::put('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'update']);
Route::post('/lendings', [LendingController::class, 'store']);
Route::delete('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);

//egyéb végpontok
Route::patch('/user_update_password/{user_id}', [UserController::class, 'updatePassword']);
//ha paraméteres a függvény, akkor az elérési útban is jeleznem kell, ezt {} zárójellel tudom megtenni