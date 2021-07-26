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
////////////////////////////// User Interface //////////////////////////////

/* 分享網站網址 */
Route::get('/shareShortUrl', 'App\Http\Controllers\AdminController@shareShortUrl')->name('shareShortUrl');

/* 通知 */
Route::get('/notification', 'App\Http\Controllers\MemberController@notification')->name('notification');

/* 訂單管理 */
Route::get('/order', 'App\Http\Controllers\OrderController@order')->name('order');

/* 首頁 */
Route::get('/home', 'App\Http\Controllers\ProductController@home')->name('home');

/* 商品管理 */
Route::get('/admin', 'App\Http\Controllers\ProductController@admin')->name('admin');


////////////////////////////// Manage interface //////////////////////////////

/*新增 jobs 更新全部商品價格 */
Route::post('updateProductsPrice', 'App\Http\Controllers\AdminController@updateProductsPrice');

/* 上傳商品圖片 */
Route::post('uploadImage', 'App\Http\Controllers\AdminController@uploadImage');

/* 刪除商品的 Redis */
Route::get('deleteProductsRedis', 'App\Http\Controllers\AdminController@deleteProductsRedis');

/* 會員註冊 */
Route::post('register', 'App\Http\Controllers\MemberController@register')->name('register');

/*將會員通知標記已讀 */
Route::post('readedNotification', 'App\Http\Controllers\MemberController@readedNotification');

/* 會員登入 */
Route::post('signIn', 'App\Http\Controllers\MemberController@signIn')->name('signIn');


/* 會員授權操作 */
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('cart', 'App\Http\Controllers\CartController@addProductsToCart'); //將商品放進購物車
    Route::post('getCart', 'App\Http\Controllers\CartController@getCart'); //取得購物車資料
    Route::post('editCart', 'App\Http\Controllers\CartController@editCart'); //編輯購物車商品資料
    Route::post('deleteCart', 'App\Http\Controllers\CartController@deleteCart'); //刪除購物車商品資料
    Route::post('checkOutCart', 'App\Http\Controllers\CartController@checkOutCart'); //結帳
    Route::post('getCheckedOutCart', 'App\Http\Controllers\CartController@getCheckedOutCart'); //取得已結帳訂單資料
    Route::post('signOut', 'App\Http\Controllers\MemberController@signOut'); //會員登出
    Route::post('member', 'App\Http\Controllers\MemberController@member'); //取得會員資料
});

/* 匯出商品清單 */
Route::get('productsExport', 'App\Http\Controllers\ExportController@productsExport')->name('productsExport');

/* 匯出商品清單(分類) */
Route::get('productsMultipleExport', 'App\Http\Controllers\ExportController@productsMultipleExport')->name('productsMultipleExport');

/* 匯入商品清單 */
Route::post('productsImport', 'App\Http\Controllers\ImportController@productsImport')->name('productsImport');
