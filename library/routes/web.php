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
    return view('welcome');
});



Route::get('index',[
	'as'=>'trangchu',
	'uses'=>'PageController@getindex',
]);
Route::get('product/{id}',[
	'as'=>'product',
	'uses'=>'PageController@getproduct',
]);
Route::get('product-detail/{id}',[
	'as'=>'detail',
	'uses'=>'PageController@getProductDetail',
]);
Route::get('add-to-cart/{id}',[
	'as'=>'add-cart',
	'uses'=>'PageController@getAddCart',
]);
Route::get('del-product/{id}',[
	'as'=>'delete',
	'uses'=>'PageController@getDelete',
]);
Route::post('add-many-product',[
	'as'=>'add-many',
	'uses'=>'PageController@postAddMany',
]);
Route::post('order',[
	'as'=>'order',
	'uses'=>'OrderController@postOrder',
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'OrderController@getCheckout'
]);
Route::get('dang-ki',[
	'as'=>'signup',
	'uses'=>'SignUpController@getSignUp'
]);
Route::post('dang-ki',[
	'as'=>'sign-up',
	'uses'=>'SignUpController@postSignUp',
]);
Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'LoginController@getLogin',
]);
Route::post('dangnhap',[
	'as'=>'login1',
	'uses'=>'LoginController@postLogin',
]);
Route::get('about',[
	'as'=>'about',
	'uses'=>'PageController@getAbout',
]);
Route::get('contact',[
	'as'=>'contact',
	'uses'=>'PageController@getContact',
]);
Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'LoginController@getLogout',
]);
Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch',
]);
Route::get('all-product',[
	'as'=> 'all-product',
	'uses'=>'PageController@getAllProduct'
]);


Route::group(['prefix'=>'/admin'],function(){
	Route::get('index-admin',[
		'as'=>'indexadmin',
		'uses'=>'AdminController@getindex',
	]);
	Route::get('User-Manager',[
		'as'=>'user-manager',
		'uses'=>'AdminController@getUserManager',
	]);
	Route::get('Del-User/{id}',[
		'as' =>'del-user',
		'uses'=>'AdminController@getDeleteUser',
	]);
	Route::get('Add-User',[
		'as' =>'add-user',
		'uses'=>'AdminController@getAddUser',		
	]);
	Route::post('Add-User',[
		'as' =>'adduser',
		'uses'=>'AdminController@postAddUser',		
	]);
	Route::get('Category-Manager',[
		'as'=>'Category-Manager',
		'uses'=>'AdminController@getCategoryManager',
	]);
	Route::get('Del-Cate/{id}',[
		'as' =>'del-cate',
		'uses'=>'AdminController@getDeleteCategory',
	]);
	Route::get('Add-Cate',[
		'as'=>'add-cate',
		'uses'=>'AdminController@getAddCategory',
	]);
	Route::post('add-cate',[
		'as'=>'addCate',
		'uses'=>'AdminController@postAddCategory',
	]);
	Route::get('Form-edit-cate/{id}',[
		'as'=>'edit-cate',
		'uses'=>'AdminController@getEditCate',
	]);
	Route::post('edit-cate/{id}',[
		'as'=>'EditCate',
		'uses'=>'AdminController@postEditCate',
	]);
	Route::get('ProductManager',[
		'as'=>'ProductManager',
		'uses'=>'AdminController@getProductManager',
	]);
	Route::get('Del-Product/{id}',[
		'as'=>'Del-Product',
		'uses'=>'AdminController@getDeleteProduct',
	]);
	Route::get('Add-Product',[
		'as'=>'Add-Product',
		'uses'=>'AdminController@getAddProduct',
	]);
	Route::post('Add-Product',[
		'as'=>'AddProduct',
		'uses'=>'AdminController@postAddProduct',
	]);
	Route::get('Edit-Product/{id}',[
		'as'=>'Edit-Product',
		'uses'=>'AdminController@getEditProduct',
	]);
	Route::post('Edit-Product/{id}',[
		'as'=>'EditProduct',
		'uses'=>'AdminController@postEditProduct',
	]);
	Route::get('Bill-Manager',[
		'as'=>'BillManager',
		'uses'=>'AdminController@getBillManager',
	]);
	Route::get('Bill-Product/{id}',[
		'as'=>'Bill-Product',
		'uses'=>'AdminController@getBillProduct',
	]);
	Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'AdminController@getLogout',
	]);
});
Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');
