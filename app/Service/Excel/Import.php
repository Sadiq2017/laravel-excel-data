<?php

declare(strict_types=1);

namespace App\Service\Excel;

use App\Jobs\UploadImageJob;
use App\Models\Product;
use App\Service\Currency\Converter;

class Import
{

    public static function run($data)
    {
        $product = new Product();

        $items = array();

        foreach ($data->where('available', 1) as $row) {
            $id = $product->insertGetId([
                'scu' => $row['scu'],
                'url' => $row['url'],
                'name' => $row['name'],
                'description' => $row['description'],
                'description_full' => $row['description_full'],
                'price' => $row['price'],
                'converted_price' => Converter::convertedPrice($row['price'], $row['currency_id']),
                'currency' => $row['currency_id'],
                'available' => $row['available'],
            ]);
            $images = $row['images'] ? explode(',', $row['images']) : null;
            if ($images) {
                $items[] = [
                    'id' => $id,
                    'path' => $images,
                ];
            }

        }
        UploadImageJob::dispatch($items);
    }


}
