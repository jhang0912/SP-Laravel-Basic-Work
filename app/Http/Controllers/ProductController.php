<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Products;

class ProductController extends Controller
{
    /* 取得商品資料 */
    public function getProduct()
    {
        $products = Products::where('mvp', 0)->orderby('price')->get();
        $mvp_products = Products::where('mvp', 1)->orderby('price')->get();

        return view('home', [
            'products' => $products,
            'mvp_products' => $mvp_products
        ]);
    }

    /* 上傳商品圖片 */
    public function uploadImage(Request $request)
    {
        $productId = $request->input('product_id');
        $file = $request->file('product_image');

        if (is_null($productId)) {
            return redirect()->back()->withErrors(['msg'=>'參數錯誤']);
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
