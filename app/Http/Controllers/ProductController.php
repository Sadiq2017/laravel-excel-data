<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ExcelUploadRequest;
use App\Models\Product;
use App\Service\Excel\Analyze;
use App\Service\Excel\ExcelData;
use App\Service\Excel\Import;
use Illuminate\Support\Facades\Cache;


class ProductController extends Controller
{
    public function index()
    {
        return view('excel.upload');
    }


    public function upload(ExcelUploadRequest $request)
    {
        $data = array();
        if ($request->hasFile('file')) {
            $items = ExcelData::get($request->file('file'));
            $data = Analyze::filter($items);
            if (!Cache::get('excel')) {
                Cache::put('excel', $items);
            }
        }
        return back()->with(compact('data'));
    }


    public function import()
    {
        $cache = Cache::get('excel');
        if (empty($cache)) {
            return redirect('/')->with('error-message', 'Товар не найден');
        }
        Import::run($cache);
        Cache::forget('excel');
        return redirect()->back()->with('success', 'Товар импортирован');
    }

    public function list()
    {
        $products = Product::with('images')->get();
        return view('excel.list')->with('products', ($products));
    }


}
