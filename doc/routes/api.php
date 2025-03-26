<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('testapi', function (Request $request) {
//    return $request;
    return response()->json($request, 200);
});




Route::group([
    'prefix' => 'v1',
    'namespace' => 'Admin',
    'middleware' => ['token']
], function (){

//      Route::get('muhammadjon' , 'ApiController@muhammadjon')->name('muhammadjon');

    Route::resource("/sen","ApiController");

    
Route::get('api', function () {
//    $ssss = [];
    $ssss = App\Models\Staff::select('id', 'last_name', 'first_name', 'middle_name', 'phone', 'passport_seria', 'passport_number')->get();

        return response()->json($ssss, 200);
});

});

