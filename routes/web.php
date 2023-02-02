<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
Route::get('/', [ListingController::class, 'index']);

//SHOW CREATE FORM
Route::get('/listings/create', [ListingController::class, 'create']);

// STORE LISTING DATA 
Route::post('/listings', [ListingController::class, 'store']);



// SINGLE LISTING
Route::get('/listings/{listing}', [ListingController::class, 'show']);

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