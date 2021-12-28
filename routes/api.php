<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Notifications\TestNotification;
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

Route::get('email-test', function(){

    $details['email'] = 'ayush@ranium.in';
    
    dispatch(new App\Jobs\SendEmailJob($details));
    
    dd('done');
    });

    Route::get('notify', function(){
        $user = User::first();
        $user->notify(new TestNotification($user));
    });