<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
use App\Models\User;


Route::get('/appointments', function () {
    $appointments = [
        'CO',
        '2IC',
        'ADJT',
        'QM',
        'A CLK',
        'G CLK',
        'Q CLK',
        'ACCT CLK',
        'A COY COMD',
        'B COY COMD',
        'C COY COMD',
        'D COY COMD',
        'HQ COY COMD',
        'HQ',
        'HEAD CLK',
        'JCO',
        'NCO',
        'OR',
        'OFFICER'
    ];

    return response()->json($appointments);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/', function () {
        return response()->json(['message' => 'Welcome to the Home Page']);
    });
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [UserController::class, 'logout']);
});
