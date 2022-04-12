<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('approve-quizze/{id}', [App\Http\Controllers\QuizzController::class, "ApproveQuizze"]);
});
