<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TaskController;
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

# Need to guard by auth middleware

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/', function () {
        return response()->json(['message' => 'Welcome to the Home Page']);
    });
    
    Route::get('/users', [UserController::class, 'getAllUser']);
    Route::get('/users/me', [UserController::class, 'getMe']);
    Route::get('/users/{id}', [UserController::class, 'getUser']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'deleteUser']);
    Route::post('/logout', [UserController::class, 'logout']);

    Route::apiResource('/tasks', TaskController::class);
    Route::apiResource('/events', EventController::class);
});
