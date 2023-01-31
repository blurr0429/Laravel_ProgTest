<?php

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
// ALL LISTINGS
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listing',
        'listings' =>  Listing::all()
    ]);
});

// SINGLE LISTING
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

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