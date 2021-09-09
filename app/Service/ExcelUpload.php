<?php


namespace App\Service;


use App\Imports\ExcelData;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUpload
{
   public static function getData($file)
   {
       $items=array();
       $rows= Excel::toCollection(new ExcelData,$file)->first()->toArray();
       $header=$rows[0];
       unset($rows[0],$rows[1]);
       foreach ($rows as $row){
           if (!empty(array_filter(array_unique($row)))){
               $items[]=array_combine($header,$row);

           }
       }
       $items=collect($items);

       return $items;
   }

    public static function analyzeData($items)
    {
        return  [
            'total_count'=>$items->count(),
            'available_count'=>$items->where('available',1)->count(),
            'with_description_count'=>$items->whereNotNull('description')->count(),
            'with_description_full_count'=>$items->whereNotNull('description_full')->count(),
            'with_image_count'=>$items->whereNotNull('images')->count(),
        ];
   }

    public static function importData($data)
    {
        $product=new Product();

      foreach ($data->where('available',1) as $row){
          $items[]=[
              'scu'=>$row['scu'],
              'url'=>$row['url'],
              'description'=>$row['description'],
              'description_full'=>$row['description_full'],
              'price'=>$row['price'],
              'currency'=>$row['currency_id'],
              'available'=>$row['available'],
              'images'=> $row['images'] ? json_encode(explode(',',$row['images'])) : null
          ];

      }
      $product->insert($items);
      return $items;
  }


}
