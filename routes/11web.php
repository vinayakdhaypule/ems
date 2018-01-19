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

Route::get('/', function () 
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('department/index',['as'=>'department.index','uses'=>'DepartmentController@index']);
Route::any('deleteDepartment/{id}',['as'=>'department.delete','uses'=>'DepartmentController@deleteDepartment']);

Route::get('department',['as'=>'department.create','uses'=>'DepartmentController@create']);
Route::post('department/store',['as'=>'department.store','uses'=>'DepartmentController@storeDepartment']);
Route::get('department/edit/{id}',['as'=>'department.edit','uses'=>'DepartmentController@editDepartment']);
Route::post('department/update',['as'=>'department.update','uses'=>'DepartmentController@updateDepartment']);


Route::get('employee/index',['as'=>'employee.index','uses'=>'EmployeeController@index']);
Route::get('employee/ems',['as'=>'employee.ems','uses'=>'EmployeeController@showEmsDetails']);
Route::get('employee/map',['as'=>'employee.ems','uses'=>'EmployeeController@empMap']);		
Route::get('employee',['as'=>'employee.create','uses'=>'EmployeeController@create']);
Route::post('employee/store',['as'=>'employee.store','uses'=>'EmployeeController@storeEmployee']);
Route::get('employee/edit/{id}',['as'=>'employee.edit','uses'=>'EmployeeController@editEmployee']);
Route::post('employee/update',['as'=>'employee.update','uses'=>'EmployeeController@updateEmployee']);
Route::get('employee/show/{id}',['as'=>'employee.show','uses'=>'EmployeeController@showEmployee']);
Route::get('employee/gallery/{id}',['as'=>'employee.gallery','uses'=>'EmployeeController@getEmployeeGallerybyId']);
Route::any('employee/deleteimage/{id}',['as'=>'employee.Image','uses'=>'EmployeeController@deleteImage']);
Route::any('deleteEmployee/{id}',['as'=>'employee.delete','uses'=>'EmployeeController@deleteEmployee']);
Route::get('employee/subDept/{id}',['as'=>'subDept.ajax','uses'=>'EmployeeController@getSubDepartmentAjax']);

/* Sub Department Routes */
Route::get('sub-department/index',['as'=>'sub-department.index','uses'=>'SubDepartmentController@index']);
Route::get('sub-department/create',['as'=> 'sub-department','uses'=>'SubDepartmentController@create']);
Route::post('sub-department/store',['as'=>'sub-department.store','uses'=>'SubDepartmentController@storeSubDepartment']);


Route::resource('blog','BlogController');
Route::post('rating',['as'=>'rating.store','uses'=>'RatingController@postRatings']);


Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
     Route::get('user', 'UserController@getAuthUser');
});



Route::group(['prefix' => 'v1/api'], function(){

	Route::get('product-list',['as'=>'product.list','uses'=>'ApiProductController@getProductList']);
	Route::post('product-add',['as'=>'product.add','uses'=>'ApiProductController@addProduct']);
	Route::get('product-show/{id}',['as'=>'product.show','uses'=>'ApiProductController@showProduct']);
	Route::post('product-delete/{id}',['as'=>'product.delete','uses'=>'ApiProductController@deleteProduct']);
	Route::post('product-edit/{id}',['as'=>'product.edit','uses'=>'ApiProductController@editProduct']);
	

});



