<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Platform;
use App\Models\PromptGeneration;
use App\Models\Tone;
use App\Services\CheckOwnership;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * DashboardController
 * * Mengelola tampilan dashboard utama, statistik penggunaan, 
 * dan riwayat pembuatan prompt oleh user.
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama dengan statistik ringkas.
     * * @return View
     */
    public function index(): View
    {
        $userId = Auth::id();

        // Mengambil data master untuk dropdown/opsi
        $lookups = $this->getLookupData();

        // Statistik: Platform yang paling sering digunakan
        $mostUsedPlatform = PromptGeneration::where('user_id', $userId)
            ->select('platform_id', DB::raw('count(*) as total'))
            ->groupBy('platform_id')
            ->orderByDesc('total')
            ->with('platform')
            ->first();

        $platformUsed = $mostUsedPlatform?->platform->name ?? '-';

        // Statistik: Jumlah generate hari ini
        $resultToday = PromptGeneration::where('user_id', $userId)
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Statistik: Total semua generate
        $countUserCreated = PromptGeneration::where('user_id', $userId)->count();

        // 3 riwayat terbaru
        $recent = PromptGeneration::where('user_id', $userId)
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.dashboard.index', array_merge($lookups, [
            'platformUsed'     => $platformUsed,
            'resultToday'      => $resultToday,
            'countUserCreated' => $countUserCreated,
            'recent'           => $recent
        ]));
    }

    /**
     * Menampilkan halaman form untuk generate prompt baru.
     * * @return View
     */
    public function generatePage(): View
    {
        return view('pages.reports.generate-view', $this->getLookupData());
    }

    /**
     * Menampilkan detail hasil generate prompt tertentu.
     * Dilengkapi dengan pengecekan hak akses (ownership).
     * * @param PromptGeneration $promptGeneration
     * @return View
     */
    public function result(PromptGeneration $promptGeneration): View
    {
        $promptGeneration->load(['platform', 'tone', 'language', 'user']);

        // Cek apakah data ini milik user yang sedang login
        if (!CheckOwnership::check(Auth::id(), $promptGeneration->user_id)) {
            abort(404, 'Data tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('pages.reports.result', compact('promptGeneration'));
    }

    /**
     * Menampilkan daftar riwayat (history) generate prompt dengan paginasi.
     * * @return View
     */
    public function history(): View
    {
        $historys = PromptGeneration::where('user_id', Auth::id())
            ->with(['platform', 'tone', 'language'])
            ->latest()
            ->paginate(5);

        return view('pages.reports.history', compact('historys'));
    }

    /**
     * Helper method untuk mengambil data master (Tone, Platform, Language).
     * Digunakan untuk mengurangi duplikasi kode pada index dan generatePage.
     * * @return array
     */
    private function getLookupData(): array
    {
        return [
            'tones'     => Tone::select(['id', 'name'])->get(),
            'platforms' => Platform::select(['id', 'name'])->get(),
            'languages' => Language::select(['id', 'name'])->get(),
        ];
    }
}
