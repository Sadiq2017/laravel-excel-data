<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExcelData implements WithMultipleSheets
{


    public function sheets(): array
    {
        return [
            0 => $this,
        ];
    }


}
