<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ExcelUploadRequest;
use App\Service\Excel\Analyze;
use App\Service\Excel\ExcelData;
use App\Service\Excel\Import;


class ProductController extends Controller
{
    public function upload(ExcelUploadRequest $request): array
    {
        if ($request->hasFile('file')) {
//            $file=Storage::disk('excel')->put('upload',$request->file);
            $data = ExcelData::get($request->file('file'));
            return Import::run($data);
        }
    }


}
