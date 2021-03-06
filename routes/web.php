<?php

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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about', function () {
    return view('pages.aboutus');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/booking','BookingController');
// add to payments routes
Route::get('/addtopayment', 'AddToPaymentController@index');
Route::get('/addtopayment/create/{id}', 'AddToPaymentController@create');
Route::post('/addtopayment', 'AddToPaymentController@store')->name('booking.add');

Route::get('/payment/{id}', 'FinalBookingController@index')->name('finalbooking.index');
Route::post('/payment', 'FinalBookingController@store')->name('finalbooking.store');

Route::get('/checkout', 'CheckOutController@index')->name('checkout.index');

