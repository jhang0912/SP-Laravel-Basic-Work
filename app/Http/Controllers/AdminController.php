<?php

namespace App\Http\Controllers;

use App\Http\Services\ShortUrlService;
use App\Jobs\UpdateProductsPrice;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Redis;

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
                Redis::set('products', $products);
                break;
            case 'mvp':
                Redis::set('mvp_products', $products);
                break;
        }
    }

    /* 刪除商品的 Redis */
    static function deleteProductsRedis()
    {
        $count = Products::count();
        $pages = ceil($count / 10);

        for ($i = 1; $i <= $pages; $i++) {
            Redis::del("products_$i");
        }
        Redis::del('products');
        Redis::del('mvp_products');
    }

    /* 使用 Queue 更新全部商品價格 */
    public function updateProductsPrice(Request $request)
    {
        $discount = $request->input('discount');
        $products = Products::get();

        foreach ($products as $product) {
            UpdateProductsPrice::dispatch($product, $discount);
        }

        $this->deleteProductsRedis();
    }

    /* 分享本網站短網址 */
    public function shareShortUrl()
    {
        $service = new ShortUrlService();
        $url = $service->createShortUrl();

        return view('admin.shareShortUrl', [
            'url' => $url
        ]);
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

        $this->deleteProductsRedis();

        return redirect()->back();
    }
}
