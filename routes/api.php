<?php

use App\Http\Controllers\API\EmployeeController;
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

Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
