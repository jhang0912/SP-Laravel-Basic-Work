<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;


class ImportController extends Controller
{
    public function productsImport(Request $request)
    {
        Excel::import(new ProductsImport, $request->file('products_import'));

        AdminController::deleteProductsRedis();

        return redirect()->back();
    }
}
