<?php

namespace App\Exports;

use App\Models\Products;
use App\Exports\Sheets\Products_MVP_Sheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class ProductsMultipleExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $sheets = [];

        foreach ([true,false] as $MVP) {
            $sheets[] = new Products_MVP_Sheet($MVP);
        }

        return $sheets;
    }
}
