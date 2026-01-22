<?php

namespace App\Http\Controllers;

use App\Models\PromptGeneration;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function ExportPDF($id)
    {
        $item = PromptGeneration::select('generated_result')->where('id', $id)->first();
        $data = $item->generated_result;
        $pdf = Pdf::loadView('exportpdf', compact('data'));
        $date = Carbon::today();
        $random = rand(10, 100);
        return $pdf->download("Generated-$date-$random");
    }
}
