<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    /* 取得商品資料 */
    public function getProduct(Request $request)
    {
        $count = Products::count();
        $pages = ceil($count / 10);
        $currentPage = isset($request->all()['page']) ? $request->all()['page'] : 1;
        $offset = ($currentPage - 1) * 10;

        if (isNull(Redis::get("products_$currentPage"))) {

            $products = Products::getProducts($offset);

            $this->createProductsRedis($products, $currentPage);
        }

        $products = json_decode(Redis::get("products_$currentPage"));

        return view('admin', [
            'products' => $products,
            'pages' => $pages,
            'currentPage' => $currentPage
        ]);
    }

    /* 將商品資料寫入 Redis */
    public function createProductsRedis($products, $currentPage)
    {
        Redis::set("products_$currentPage", $products);
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
