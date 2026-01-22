<?php

namespace App\Http\Controllers;

use App\Exports\HistoryExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcel extends Controller
{
    public function DownloadExcel()
    {
        return Excel::download(new HistoryExport(), 'daftar-export.xlsx');
    }
}
