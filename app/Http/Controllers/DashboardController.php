<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Platform;
use App\Models\PromptGeneration;
use App\Models\Tone;
use App\Services\CheckOwnership;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $tones = Tone::select(['id', 'name'])->get();
        $platforms = Platform::select(['id', 'name'])->get();
        $languages = Language::select(['id', 'name'])->get();
        $platformUsed = PromptGeneration::where('user_id', Auth::user()->id)
            ->select('platform_id', DB::raw('count(*) as total'))
            ->groupBy('platform_id')
            ->orderByDesc('total')
            ->with('platform')
            ->first()
            ?->platform->name;
        $resultToday = PromptGeneration::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();
        $countUserCreated = PromptGeneration::where('user_id', Auth::user()->id)->count();
        $recent = PromptGeneration::where('user_id', Auth::user()->id)->latest()->limit(3)->get();
        return view('pages.dashboard.index', compact('tones', 'platforms', 'languages', 'platformUsed', 'resultToday', 'countUserCreated', 'recent'));
    }
    public function generatePage()
    {
        $tones = Tone::select(['id', 'name'])->get();
        $platforms = Platform::select(['id', 'name'])->get();
        $languages = Language::select(['id', 'name'])->get();
        return view('pages.reports.generate-view', compact('tones', 'platforms', 'languages'));
    }

    public function result(PromptGeneration $promptGeneration)
    {
        $promptGeneration->load(['platform', 'tone', 'language', 'user']);
        $user = Auth::user();

        if (!CheckOwnership::check($user->id, $promptGeneration->user->id)) {
            abort(404, 'nyari apa mas?');
        }

        return view('pages.reports.result', compact('promptGeneration'));
    }

    public function history()
    {
        $user = Auth::user();

        $historys = PromptGeneration::where('user_id', $user->id)->with(['platform', 'tone', 'language'])->latest()->paginate(10);

        return view('pages.reports.history', compact('historys'));
    }
}
