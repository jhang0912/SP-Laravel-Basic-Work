<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About「Laravel Basic Work」

這是一份使用 PHP 框架 Laravel 進行撰寫的初級作品，以「[Laravel Beginner Work](https://github.com/jhang0912/SideProject-Laravel-Beginner-Work)」專案為基礎，逐步學習 Laravel 框架的各種技術，並且以電商平台的各種功能為目標去實作，最後再搭配前端元件 View 顯示畫面，使用的技術元件與專案架構如下:

## Demo
### [Laravel Basic Work Demo 1](https://youtu.be/De1TCQnbdXw)
- Queue
- Observer
- Notification
- Redis
### [Laravel Basic Work Demo 2](https://youtu.be/RQU2Da7p0ng)
- Picsee API
- Log
- Error Exception
### [Laravel Basic Work Demo 3](https://youtu.be/pxvfy2Tgzdg)
- Factory
- Testing
- Dusk
## Routes
### User Interface
- GET：(shareShortUrl：AdminController@shareShortUrl)->name(shareShortUrl)
- GET：(notification：MemberController@notification)->name(notification)
- GET：(order：OrderController@order)->name(order)
- GET：(home：ProductController@home)->name(home)
- GET：(admin：ProductController@admin)->name(admin)
### Manage interface
- POST：(updateProductsPrice：AdminController@updateProductsPrice)
- POST：(uploadImage：AdminController@uploadImage)
- POST：(register：MemberController@register)
- POST：(readedNotification：MemberController@readedNotification)
- POST：(cart：CartController@addProductsToCart)
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
### Admin
- 將商品資料寫入 Redis　-createAdminProductsRedis-
- 將前台商品資料寫入 Redis　-createHomeProductsRedis-
- 刪除商品的 Redis　-deleteProductsRedis-
- 使用 Queue 更新全部商品價格　-updateProductsPrice-
- 分享本網站短網址　-shareShortUrl-
- 上傳商品圖片　-uploadImage-
### Cart
- 新增購物車與添加商品整合並搭配商品數量檢查防呆　-addProductsToCart-
- 取得購物車資料　-getCart-
- 編輯購物車商品資料(修改數量)　-editCart-
- 刪除購物車商品資料　-deleteCart-
- 購物車結帳並搭配會員VIP折扣優惠 -checkOutCart-
- 取得已結帳訂單資料 -getCheckedOutCart-
### Member
- 會員註冊　-register-
- 會員登入　-signIn-
- 取得會員資料　-member-
- 會員登出　-signOut-
- 取得會員通知資料並回傳 view(member.notification)　-notification-
- 將會員通知標記已讀　-readedNotification-
### Order
- 取得已結帳訂單資料並回傳 view　-order-
### Product
- 取得商品資料並回傳 view(home)　-home-
- 取得商品資料並回傳 view(admin.products)　-admin-

## Views
- 錯誤顯示 　-error-
- 首頁　-home-
### admin
- 訂單管理　-orders-
- 商品管理　-products-
- 分享網址　-shareShortUrl-
### layouts
- HTML網頁元件　-html-
- 網頁頂部導覽列　-navbar-
### member
- 會員通知管理 -notification-

## Models
### Cart_items （use SoftDeletes）
- （id／cart_id／product_id／quantity／created_at／updated_at）
### Carts
- （id／user_id／total_price／checked_out／deliveried／created_at／updated_at）
### Images
-  （id／source_type／source_id／path／file_name／created_at／updated_at）
### Jobs
- （id／queue／payload／attempts／reserved_at／available_at／created_at）
### Log_errors
- （id／user_id／exception／message／line／trace／method／params／uri／user_agent／header／created_at／updated_at）
### Notifications
- （id／type／notifiable_type／notifiable_id／data／read_at／created_at／updated_at）
### Product_user
- （id／user_id／product_id／created_at／updated_at）
### Products
- （id／cht_name／en_name／content／price／quantity／created_at／updated_at）
### User
- （id／name／email／email_verified_atpassword／level／remember_token／remember_tokencreated_at／updated_at）
