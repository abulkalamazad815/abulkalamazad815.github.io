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
/*--welcome--*/
Route::get('/','WelcomeController@index');

Route::get('/category-view/{id}','WelcomeController@category');

Route::get('/subcategory-view/{id}','WelcomeController@subcategory');

Route::get('/product-details/{id}','WelcomeController@productDetails');

Route::get('/contact','WelcomeController@contact');


/*Cart Controller*/
Route::post('/cart/add', 'CartController@addToCart');
Route::get('/cart/show', 'CartController@showCart');
Route::get('/cart/delete/{id}', 'CartController@deleteCartProduct');


/*Customer Controller*/
Route::post('/customer/sign-up', 'CustomerController@customerRegistration');
Route::post('/customer/login', 'CustomerController@customerLogin');
Route::get('/customer/logout', 'CustomerController@customerLogout');
Route::get('/refresh_captcha', 'CustomerController@refreshCaptcha')->name('refresh_captcha');

/*Checkout Controller*/
Route::get('/checkoutLogin', 'CheckoutController@customerLogin');
Route::get('/checkoutRegistration', 'CheckoutController@customerRegistration');
Route::post('/checkout/sign-up', 'CheckoutController@customercheckoutRegistration');
Route::post('/checkout/login', 'CheckoutController@customercheckoutLogin');
Route::get('/checkout/shipping', 'CheckoutController@showShippingForm');
Route::post('/checkout/save-shipping', 'CheckoutController@saveShippingInfo');
Route::get('/checkout/payment', 'CheckoutController@showPaymentForm');
Route::post('/checkout/save-order', 'CheckoutController@saveOrderInfo');
Route::get('/checkout/my-home', 'CheckoutController@customerHome');


/*--Auth--*/
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');





Route::group(['middleware'=>'AuthenticateMiddleware'], function(){
    
/*category info*/
Route::get('/category/add','CategoryController@createCategory');

Route::post('/category/save','CategoryController@storeCategory');

Route::get('/category/manage','CategoryController@manageCategory');

Route::get('/category/edit/{id}','CategoryController@editCategory');

Route::post('/category/update','CategoryController@updateCategory');

Route::get('/category/delete/{id}','CategoryController@deleteCategory');


/*subcategory*/
Route::get('/subcategory/add','SubcategoryController@createSubcategory');

Route::post('/subcategory/save','SubcategoryController@storeSubcategory');

Route::get('/subcategory/manage','SubcategoryController@manageSubcategory');

Route::get('/subcategory/edit/{id}','SubcategoryController@editSubcategory');

Route::post('/subcategory/update','SubcategoryController@updateSubcategory');

Route::get('/subcategory/delete/{id}','SubcategoryController@deleteSubcategory');


/*menufacturer info*/
Route::get('/manufacturer/add','ManufacturerController@createManufacturer');

Route::post('/manufacturer/save','ManufacturerController@storeManufacturer');

Route::get('/manufacturer/manage','ManufacturerController@manageManufacturer');

Route::get('/manufacturer/edit/{id}','ManufacturerController@editManufacturer');

Route::post('/manufacturer/update','ManufacturerController@updateManufacturer');

Route::get('/manufacturer/delete/{id}','ManufacturerController@deleteManufacturer');


/*product info*/
Route::get('/product/add','ProductController@createProduct');

Route::post('/product/save','ProductController@storeProduct');

Route::get('/product/manage','ProductController@manageProduct');

Route::get('/product/view/{id}','ProductController@viewProduct');

Route::get('/product/edit/{id}','ProductController@editProduct');

Route::post('/product/update','ProductController@updateProduct');

Route::get('/product/moreimage/{id}','ProductController@addProductImag');

Route::post('/product/addmoreimage','ProductController@addProductMultiImag');

Route::get('/product/delete/{id}','ProductController@deleteProduct');


/*User info*/
Route::get('/user/add','UserController@createUser');

Route::post('/user/save','UserController@storeUser');

Route::get('/user/manage','UserController@manageUser');

Route::get('/user/edit/{id}','UserController@editUser');

Route::post('/user/update','UserController@updateUser');

Route::get('/user/delete/{id}','UserController@deleteUser');


/*Customer info*/
Route::get('/customer/view/{id}','CustomerController@viewCustomer');

Route::get('/customer/manage','CustomerController@manageCustomer');

Route::get('/customer/delete/{id}','CustomerController@deleteCustomer');


/*Slider1 info*/
Route::get('/slider/add','SliderController@createSlider1');

Route::post('/slider/save','SliderController@storeSlider1');

Route::get('/slider/manage','SliderController@manageSlider1');

Route::get('/slider/edit/{id}','SliderController@editSlider1');

Route::post('/slider/update','SliderController@updateSlider1');

Route::get('/slider/delete/{id}','SliderController@deleteSlider1');

/*Slider2 info*/
Route::get('/slider2/add','SliderController@createSlider2');

Route::post('/slider2/save','SliderController@storeSlider2');

Route::get('/slider2/manage','SliderController@manageSlider2');

Route::get('/slider2/edit/{id}','SliderController@editSlider2');

Route::post('/slider2/update','SliderController@updateSlider2');

Route::get('/slider2/delete/{id}','SliderController@deleteSlider2');

});


