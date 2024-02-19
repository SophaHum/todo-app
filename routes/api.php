<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => '/tasks', 'as' => 'tasks.'], function () {
  Route::get('/', [TaskController::class, 'list']);
  Route::get('/{id}', [TaskController::class, 'get'])
    ->where('id', '[1-9][0-9]*');
  Route::post('/', [TaskController::class, 'store']);
  Route::put('/{id}', [TaskController::class, 'update'])
    ->where('id', '[1-9][0-9]*');
  Route::delete('/{id}', [TaskController::class, 'delete'])
    ->where('id', '[1-9][0-9]*');
  Route::put('/', [TaskController::class, 'reorder']);
});
