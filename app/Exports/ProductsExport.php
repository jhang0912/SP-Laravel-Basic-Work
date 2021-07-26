<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Products::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'cht_name',
            'en_name',
            'mvp',
            'content',
            'equipment',
            'price',
            'quantity',
        ];
    }
}
