<?php

use Illuminate\Support\Facades\Route;

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

    return view('admin_login');
});

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard');

//Employee
Route::get('all-employee', 'EmployeeController@index')->name('all.employee');
Route::get('add-employee', 'EmployeeController@create')->name('add.employee');
Route::post('store-employee', 'EmployeeController@store')->name('store.employee');
Route::get('edit-employee{id}','EmployeeController@edit')->name('edit.employee');
Route::post('update.employee{id}','EmployeeController@update')->name('update.employee');
Route::get('delete-employee{id}','EmployeeController@destroy')->name('delete.employee');


//customer 
Route::get('all-customer', 'CustomerController@index')->name('all.customer');
Route::get('add-customer', 'CustomerController@create')->name('add.customer');
Route::post('store-customer', 'CustomerController@store')->name('store.customer');
Route::get('edit-customer{id}','CustomerController@edit')->name('edit.customer');
Route::post('update-customer{id}','CustomerController@update')->name('update.customer');
Route::get('delete-customer{id}','CustomerController@destroy')->name('delete.customer');


//Supplier


Route::get('all.supplier', 'SupplierController@index')->name('all.supplier');
Route::get('add.supplier', 'SupplierController@create')->name('add.supplier');
Route::post('store.supplier', 'SupplierController@store')->name('store.supplier');
Route::get('delete.supplier{id}','SupplierController@destroy')->name('delete.supplier');


//category

Route::get('all-category', 'CategoryController@index')->name('all.category');
Route::get('store-category', 'CategoryController@create')->name('store.category');
Route::post('store-category', 'CategoryController@store')->name('store.category');
Route::get('edit-category{id}','CategoryController@edit')->name('edit.category');
Route::post('update-category{id}','CategoryController@update')->name('update.category');

Route::get('delete-category{id}','CategoryController@destroy')->name('delete.category');



//product

Route::get('all-product', 'ProductController@index')->name('all.product');
Route::get('add-product', 'ProductController@create')->name('add.product');
Route::post('store-product', 'ProductController@store')->name('store.product');


Route::get('edit-product{id}', 'ProductController@edit')->name('edit.product');
Route::post('update.product{id}', 'ProductController@update')->name('update.product');

Route::get('delete-product{id}', 'ProductController@destroy')->name('delete.product');


//Expense

Route::get('all-expense', 'ExpenseController@index')->name('all.expense');
Route::get('add-expense', 'ExpenseController@create')->name('add.expense');
Route::post('store.expense', 'ExpenseController@store')->name('store.expense');
Route::get('today-expense', 'ExpenseController@todayexpense')->name('today.expense');
Route::get('monthly.expense', 'ExpenseController@monthlyexpense')->name('monthly.expense');
Route::get('yearly-expense', 'ExpenseController@yearlyexpense')->name('yearly.expense');



//Attendence...

Route::get('take.attendence', 'AttendenceController@takeattendence')->name('take.attendence');
Route::post('insert.attendence','AttendenceController@insertattendence')->name('insert.attendence');

Route::get('all.attendence','AttendenceController@allattendence')->name('all.attendence');

Route::get('edit.attendence{edit_date}','AttendenceController@editattendence')->name('edit.attendence');

Route::post('update.attendence','AttendenceController@updateattendence')->name('update.attendence');




//Pos route.......

Route::get('pos', 'PosController@index')->name('pos');


Route::post('add-cart', 'CartController@add_cart')->name('add.cart');
Route::post('update-cart{rowId}', 'CartController@update_cart')->name('update.cart');

Route::get('remove.cart{rowId}', 'CartController@remove_cart')->name('remove.cart');


Route::post('create-invoice', 'CartController@create_invoice')->name('create.invoice');

Route::post('invoice', 'CartController@invoice')->name('invoice');


//order Route


Route::get('pending-order', 'OrderController@pendingorder')->name('pending.order');
Route::get('success.order', 'OrderController@successorder')->name('success.order');

Route::get('all.order', 'OrderController@allorder')->name('all.order');

Route::get('approved{id}', 'OrderController@approved')->name('approved');

