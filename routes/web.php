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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Admin Panel Routes





// Admin - User Operation Routes
Route::get('/deleteUser/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
Route::get('/editUser/{id}','UserUpdateController@show');
Route::post('/editUser/{id}','UserUpdateController@edit');

Route::get('/projectListForAdmin', 'ProjectController@projectListForAdmin');
Route::get('/staffListForAdmin', 'StaffController@staffListForAdmin');
Route::get('/inEmpListForAdmin', 'EmployeeController@inEmpListForAdmin');
Route::get('/outEmpListForAdmin', 'EmployeeController@outEmpListForAdmin');
Route::get('/inTchListForAdmin', 'TeacherController@inTchListForAdmin');
Route::get('/outTchListForAdmin', 'TeacherController@outTchListForAdmin');
Route::get('/studentListForAdmin', 'StudentController@studentListForAdmin');
Route::get('/receiptListForAdmin', 'ReceiptController@receiptListForAdmin');
Route::get('/inDocListForAdmin', 'DocumentController@inDocListForAdmin');
Route::get('/outDocListForAdmin', 'DocumentController@outDocListForAdmin');
Route::get('/photoListForAdmin', 'PhotoController@photoListForAdmin');

Route::get('/revenueListForAdmin', 'RevenueController@revenueListForAdmin');
Route::get('/expenseListForAdmin', 'ExpenseController@expenseListForAdmin');
Route::get('/salaryListForAdmin', 'SalaryController@salaryListForAdmin');
Route::get('/taxListForAdmin', 'TaxController@taxListForAdmin');
Route::get('/balanceListForAdmin', 'BalanceController@balanceListForAdmin');



// Officail Departmetn Routes
Route::resource('/project', 'ProjectController');
Route::get('/projectList', 'ProjectController@projectList');

Route::resource('/staff', 'StaffController');
Route::get('/staffList', 'StaffController@staffList');

Route::resource('/student', 'StudentController');
Route::get('/studentList', 'StudentController@studentList');

Route::resource('/employee', 'EmployeeController');
Route::get('/inEmpList', 'EmployeeController@inEmpList');
Route::get('/outEmpList', 'EmployeeController@outEmpList');

Route::resource('/teacher', 'TeacherController');
Route::get('/inTchList', 'TeacherController@inTchList');
Route::get('/outTchList', 'TeacherController@outTchList');

Route::resource('/document', 'DocumentController');
Route::get('/inDocList', 'DocumentController@inDocList');
Route::get('/outDocList', 'DocumentController@outDocList');

Route::resource('/photo', 'PhotoController');

Route::resource('/receipt', 'ReceiptController');
Route::get('/receiptList', 'ReceiptController@receiptList');

Route::resource('/employees', 'EmployeeController');
Route::get('/addEmployee', 'EmployeeController@create');

// Finance Departmetn Routes
Route::resource('/revenue', 'RevenueController');
Route::resource('/expense', 'ExpenseController');
Route::resource('/salary', 'SalaryController');
Route::resource('/tax', 'TaxController');
Route::resource('/balance', 'BalanceController');
