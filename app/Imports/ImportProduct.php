<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          return new CategoryProductModel([
        'category_id' => $row[0],
        'product_name' => $row[1], 
        'meta_keywords' => $row[2],
        'brand_id' => $row[3],
        'product_desc' => $row[4],
        'product_content' => $row[5],
        'product_price' => $row[6],
        'product_image' => $row[7],
        'product_status' => $row[8],
        ]);
    }
}
