<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About「Laravel Basic Work」

這是一份使用 PHP 框架 Laravel 進行撰寫的初級作品，以電商平台的各種功能為目標去實作，並搭配前端元件 View 顯示畫面，使用的技術元件包含:

## Demo
### [Laravel Basic Work]()

## Routes
- POST：(cart：CartController@addProductsToCart)
- POST：(register：MemberController@register)
- group：([middleware => auth:api], function () {
    - POST：(cart：CartController@addProductsToCart)
    - POST：(signOut：MemberController@signOut)
    - POST：(member：MemberController@member)
    - POST：(getCart：CartController@getCart)
    - POST：(editCart：CartController@editCart)
    - POST：(deleteCart：CartController@deleteCart)
    - POST：(checkOutCart：CartController@checkOutCart)
    - POST：(getCheckedOutCart：CartController@getCheckedOutCart)
})

## Controllers
### Member
- 會員註冊　-register-
- 會員登入　-signIn-
- 取得會員資料　-member-
- 會員登出　-signOut-
### Cart
- 新增購物車與添加商品整合並搭配商品數量檢查防呆　-addProductsToCart-
- 取得購物車資料　-getCart-
- 編輯購物車商品資料(修改數量)　-editCart-
- 刪除購物車商品資料　-deleteCart-
- 購物車結帳並搭配會員VIP折扣優惠 -checkOutCart-
- 取得已結帳訂單資料 -getCheckedOutCart-
### Product
- 按照特殊商品(MVP)分類並取得商品資料　-getProduct-
- 上傳商品圖片　-uploadImage-

## Views

## Models
### User
- （id／name／email／email_verified_atpassword／level／remember_token／remember_tokencreated_at／updated_at）
### Carts
- （id／user_id／total_price／checked_out／deliveried／created_at／updated_at）
### Cart_items （use SoftDeletes）
- （id／cart_id／product_id／quantity／created_at／updated_at）
### Products
- （id／cht_name／en_name／content／price／quantity／created_at／updated_at）
### Images
-  （id／source_type／source_id／path／file_name／created_at／updated_at）
