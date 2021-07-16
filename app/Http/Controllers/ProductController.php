<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Products;

class ProductController extends Controller
{
    /* 取得商品資料並進入首頁 */
    public function getProduct()
    {
        $products = Products::where('mvp', 0)->orderby('price')->get();
        $mvp_products = Products::where('mvp', 1)->orderby('price')->get();

        return view('home', [
            'products' => $products,
            'mvp_products' => $mvp_products
        ]);
    }
}
