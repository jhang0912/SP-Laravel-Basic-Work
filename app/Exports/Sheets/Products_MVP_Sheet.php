<?php

namespace App\Exports\Sheets;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;


class Products_MVP_Sheet implements FromCollection, WithHeadings, WithTitle
{
    public $mvp;

    public function __construct($mvp)
    {
        $this->mvp = $mvp;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Products::where('mvp', $this->mvp)->get();
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

    public function title(): string
    {
        return $this->mvp ? 'MVP商品' : '一般商品';
    }
}
