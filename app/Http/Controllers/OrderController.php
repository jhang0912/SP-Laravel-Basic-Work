<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function order(Request $request)
    {
        $count = Carts::count();
        $pages = ceil($count / 10);
        $currentPage = isset($request->all()['page']) ? $request->all()['page'] : 1;
        $offset = ($currentPage - 1) * 10;
        $orders = Carts::where('checked_out', 1)
            ->offset($offset)
            ->limit(10)
            ->orderby('updated_at', 'DESC')
            ->with('user')
            ->with('cart_items.products')
            ->get();

        return view('admin.orders', [
            'orders' => $orders,
            'pages' => $pages,
            'currentPage' => $currentPage
        ]);

        // return response($orders);
    }
}
