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

// Fetch all customers
Route::get('/', 'CustomerController@fetchCustomers');

// Fetch customer orders against customerNumber
Route::get('/customer/orders/{customerNumber}', 'OrdersController@fetchCustomerOrders');

// Get product details against order id

Route::get('/product/details/{orderNumber}', 'ProductsController@fetchProductDetails');

// place order against customer

Route::post('/place/order', 'OrdersController@placeCustomerOrder');