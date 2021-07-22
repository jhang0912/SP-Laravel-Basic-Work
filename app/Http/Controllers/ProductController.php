<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Products;
use Illuminate\Support\Facades\Redis;


class ProductController extends Controller
{
    /* 取得商品資料並回傳 view(home) */
    public function home()
    {
        if (Redis::get('products') == null || Redis::get('mvp_products') == null) {
            $products = Products::getHomeProducts();
            AdminController::createHomeProductsRedis($products[0], 'normal');
            AdminController::createHomeProductsRedis($products[1], 'mvp');
        }

        $products = json_decode(Redis::get('products'));
        $mvp_products = json_decode(Redis::get('mvp_products'));

        return view('home', [
            'products' => $products,
            'mvp_products' => $mvp_products
        ]);
    }

    /* 取得商品資料並回傳 view(admin.products) */
    public function admin(Request $request)
    {
        $count = Products::count();
        $pages = ceil($count / 10);
        $currentPage = isset($request->all()['page']) ? $request->all()['page'] : 1;
        $offset = ($currentPage - 1) * 10;

        if (Redis::get("products_$currentPage") == null) {
            $products = Products::getAdminProducts($offset);

            AdminController::createAdminProductsRedis($products, $currentPage);
        }

        $products = json_decode(Redis::get("products_$currentPage"));

        return view('admin.products', [
            'products' => $products,
            'pages' => $pages,
            'currentPage' => $currentPage
        ]);
    }
}
