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


Route::get('/', 'PagesController@getIndex');
Route::get('/register', 'PagesController@getRegisterPage')->name('register');
Route::get('/login', 'PagesController@getLoginPage')->name('login');
Route::get('/about', 'PagesController@getAboutPage')->name('about');
Route::get('/faq', 'PagesController@getFaqPage')->name('faq');
Route::get('/privacy', 'PagesController@getPrivacyPage')->name('privacy');
Route::get('/marketplace', 'PagesController@getMarketplacePage')->name('marketplace');
Route::get('/offers', 'PagesController@getOffersPage')->name('offers');


/*Resource route for Controllers*/
Route::resource('categories', 'CategoryController');
Route::resource('offers', 'OfferController');
Route::resource('items', 'ItemController');
Route::resource('products', 'ProductController');
Route::resource('deals', 'DealsController');



Route::get('list-of-products/{item}', 'ProductController@getProductByItemId')->name('getproductwithitem');
Route::get('list-of-products/{offer}', 'ItemController@getProductByOfferId')->name('getproductswithoffer');
Route::get('list-of-products/{category}', 'CategoryController@getProductByCategoryId')->name('getproductswithcategory');

//getting images
Route::get('product/image/{filename}', 'ImageController@getProductImage')->name('productimage');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin Routes

Route::get('admin/home', 'AdminController@index')->name('dashboard');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('admin/pasword/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

//searhing products
Route::get('searchproduct', 'HomeController@searchProduct')->name('searchproduct');
/*Route to display search results after autocomplete match*/
Route::post('search-product-request', 'HomeController@searchProductHits')->name('searchproductrequest');

//filter routes
Route::post('get-product-by-price', 'ProductController@getProductByPrice')->name('getproductbyprice');
Route::post('get-product-by-discount', 'ProductController@getProductByDiscount')->name('getproductbydiscount');

//add items to cart
Route::resource('carts' , 'CartController');

Route::get('checkout', 'CartController@goToCheckOut')->name('checkout');

Route::resource('deliveries', 'DeliveryinfoController');

Route::get('payoff', 'DeliveryinfoController@payOff')->name('payoff');