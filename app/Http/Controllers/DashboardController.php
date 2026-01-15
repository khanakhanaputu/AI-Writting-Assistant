<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Platform;
use App\Models\Tone;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tones = Tone::select(['id', 'name'])->get();
        $platforms = Platform::select(['id', 'name'])->get();
        $languages = Language::select(['id', 'name'])->get();
        return view('pages.dashboard.index', compact('tones', 'platforms', 'languages'));
    }
    public function generatePage()
    {
        $tones = Tone::select(['id', 'name'])->get();
        $platforms = Platform::select(['id', 'name'])->get();
        $languages = Language::select(['id', 'name'])->get();
        return view('pages.reports.generate-view', compact('tones', 'platforms', 'languages'));
    }
}
