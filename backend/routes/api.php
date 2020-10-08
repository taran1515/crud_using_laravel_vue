<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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



// Route::post('posts', 'ApiController@createPost');
// Route::get('posts', 'ApiController@getAllPosts');

Route::get('/posts', [ApiController::class, 'getAllPosts']);

Route::get('/comment/{id}', [ApiController::class, 'getComments']);

Route::get('/user/{id}', [ApiController::class, 'getInfos']);

Route::get('read-excel', [ApiController::class, 'readCSVFile']);

Route::get('generate', [ApiController::class, 'generateCSVFile']);

Route::post('/posts/import',[ApiController::class, 'importPostData']);

Route::post('/posts',[ApiController::class, 'createPost']);

