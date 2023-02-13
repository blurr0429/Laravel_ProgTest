<?php

use App\Http\Controllers\EmployeesController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  





// ALL LISTINGS


Route::get('/listings', [ListingController::class, 'index']);

//SHOW CREATE FORM
Route::get('/listings/create', [ListingController::class, 'create']);

//SHOW CREATE FORM EMPLOYEES
Route::get('/employees/create-employee', [EmployeesController::class, 'create']);

// STORE EMPLOYEE DATA 
Route::post('/employees', [EmployeesController::class, 'store']);

// SHOW EDIT FORM EMPLOYEES
Route::get('/employees/{employee}/edit-employee', [EmployeesController::class, 'edit']);

// UPDATE EMPLOYEES
Route::put('/employees/{employee}', [EmployeesController::class, 'update']);

// DELETE EMPLOYEE
Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy']);

// STORE LISTING DATA 
Route::post('/listings', [ListingController::class, 'store']);

// SHOW EDIT FORM
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// UPDATE LISTING
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// DELETE LISTING
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// SINGLE LISTING
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// SHOW REGISTER/CREATE FORM
Route::get('/register', [UserController::class, 'create']);

// CREATE NEW USER
Route::post('/users', [UserController::class, 'store']);

// LOG USER OUT
Route::post('/logout', [UserController::class, 'logout']);

// SHOW LOGIN FORM
Route::get('/', [UserController::class, 'login']);

// LOGIN USER
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// SHOW ALL EMPLOYEES
// Route::get('/listings/{listing}', [EmployeesController::class, 'index']);

// SINGLE EMPLOYEE
// Route::get('/listings/{listing}', [EmployeesController::class, 'show']);



// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/posts/{id}', function ($id) {
//     // To show the value inside the variable for debugging
//     // dd($id);
//     // use DDD for more detailed information
//     // ddd($id);
//     return response('Post ' . $id);
// });

// Route::get('/search', function (Request $request) {
//     return ($request->name . ' ' . $request->city);
// });