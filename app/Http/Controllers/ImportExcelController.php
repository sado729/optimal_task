<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportExcel;
use App\Imports\WorkImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    function import(ImportExcel $request)
    {
        try {
            $tempPath = $request->file('select_file')->store('temp');
            $path = storage_path('app').'/'.$tempPath;

            Excel::import(new WorkImport, $path);

            return response()->json(['success' => 'Excel bazaya köçürüldü !']);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()]);
        }
    }
}
