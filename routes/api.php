<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Models\Employee;
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

Route::group(['middleware'=>'auth:api'],function(){

    Route::get('/test',function(){
            $employees = Employee::all();  // To get All Employees

            return $employees;
    });

    Route::resource('products',ProductController::class);

    // Route::get('/employee',[EmployeeController::class,'get_employees']);

    Route::get('/getEmployee',[EmployeeController::class,'get_employees']);

    Route::post('/employee',[EmployeeController::class,'update']);
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::resource('members',MemberController::class);




