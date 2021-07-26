<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Products([
            'cht_name' => $row[0],
            'en_name' => $row[1],
            'mvp' => $row[2],
            'content' => $row[3],
            'equipment' => $row[4],
            'price' => $row[5],
            'quantity' => $row[6]
        ]);
    }
}
