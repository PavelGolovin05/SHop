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

Auth::routes();

Route::get('/', 'HomeController@indexAction')->name('home');
Route::get('/allCategories', 'HomeController@allCategoriesAction');
Route::get('/admin', 'AdminController@indexAction');
Route::get('/showAddProductFrom', 'AdminController@showAddProductFromAction');
Route::get('/addCategory', 'AdminController@addCategoryAction');
Route::get('/addParameter', 'AdminController@addParameterAction');
Route::get('/addProduct', 'AdminController@addProductAction');
Route::get('/products', 'ProductController@productsAction');
Route::get('/sortProducts', 'ProductController@productsAction');
Route::get('/product', 'ProductController@productAction');
Route::get('/findProductsByName', 'ProductController@findProductsByNameAction');
Route::get('/findProductsByFilter', 'ProductController@findProductsByFilterAction');
Route::get('/addProductToBasket', 'BasketController@addProductToBasketAction')->middleware('auth');
Route::get('/basket', 'BasketController@basketAction')->middleware('auth');
Route::get('/deleteProductFromBasket', 'BasketController@deleteProductFromBasketAction')->middleware('auth');
Route::get('/statistic', 'StatisticController@indexAction');
Route::get('/statByParam', 'StatisticController@statByParamAction');
Route::get('/defForm', 'StatisticController@defFormAction');
Route::get('/defence', 'StatisticController@defenceAction');
