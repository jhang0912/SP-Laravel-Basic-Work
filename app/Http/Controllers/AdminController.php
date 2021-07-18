<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    /* 將商品資料寫入 Redis */
    static function createAdminProductsRedis($products, $currentPage)
    {
        Redis::set("products_$currentPage", $products);
    }

    /* 將前台商品資料寫入 Redis */
    static function createHomeProductsRedis($products, $category)
    {
        switch ($category) {
            case 'normal':
                Redis::set('products',$products);
                break;
            case 'mvp':
                Redis::set('mvp_products',$products);
                break;
        }
    }

    /* 上傳商品圖片 */
    public function uploadImage(Request $request)
    {
        $productId = $request->input('product_id');
        $file = $request->file('product_image');

        if (is_null($productId)) {
            return redirect()->back()->withErrors(['msg' => '參數錯誤']);
        }

        $product = Products::find($productId);
        $path = $file->store('public/images');
        $product->images()->create([
            'file_name' => $file->getClientOriginalName(),
            'path' => $path
        ]);

        return redirect()->back();
    }
}
