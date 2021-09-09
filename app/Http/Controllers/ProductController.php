<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcelUploadRequest;
use App\Imports\ExcelData;
use App\Service\ExcelUpload;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public function upload(ExcelUploadRequest $request)
    {
        if ($request->hasFile('file')){
//            $file=Storage::disk('excel')->put('upload',$request->file);
            $data= ExcelUpload::getData($request->file('file'));
            return  ExcelUpload::importData($data);
        }
    }



}
