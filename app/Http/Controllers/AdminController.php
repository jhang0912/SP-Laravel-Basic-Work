<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class AdminController extends Controller
{
    /* 取得商品資料 */
    public function getProduct(Request $request)
    {
        $count = Products::count();
        $pages = ceil($count / 10);
        $currentPage = isset($request->all()['pages']) ? $request->all()['pages'] : 1;
        $offset = ($currentPage - 1) * 10;
        $products = Products::offset($offset)->limit(10)->get();

        return view('admin', [
            'products' => $products,
            'pages' => $pages,
            'currentPage' => $currentPage
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

        return redirect()->back();
    }
}
