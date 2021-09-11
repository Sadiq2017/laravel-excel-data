<?php

declare(strict_types=1);

namespace App\Service\Excel;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class ExcelData
{
    public static function get($file): Collection
    {
        $items = array();
        $rows = Excel::toCollection(new ExcelData, $file)->first()->toArray();
        $header = $rows[0];
        unset($rows[0], $rows[1]);
        foreach ($rows as $row) {
            if (!empty(array_filter(array_unique($row)))) {
                $items[] = array_combine($header, $row);

            }
        }
        return collect($items);
    }


}
