<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Exportable;
use App\Exports\ExcelExport;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ExcelExport(), 'orders.xlsx');
    }
}
