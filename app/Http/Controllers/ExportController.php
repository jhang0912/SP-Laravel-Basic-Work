<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    /* 匯出商品清單 */
    public function productsExport()
    {
        return Excel::download(new ProductsExport, 'productsExport.xlsx');
    }
}
