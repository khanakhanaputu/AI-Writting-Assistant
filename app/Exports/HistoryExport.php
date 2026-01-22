<?php

namespace App\Exports;

use App\Models\PromptGeneration;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // Tambahkan ini
use Maatwebsite\Excel\Concerns\WithMapping;  // Tambahkan ini

class HistoryExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        // Gunakan 'with' (Eager Loading) agar aplikasi tidak lambat saat mengambil relasi platform & tone
        return PromptGeneration::with(['platform', 'tone'])
            ->where('user_id', Auth::user()->id)
            ->get();
    }

    /**
     * Ini akan menentukan baris data yang muncul
     */
    public function map($row): array
    {
        return [
            // Gunakan strip_tags() untuk menghilangkan <p> atau <a> agar Excel bersih dari kode HTML
            strip_tags($row->context_description),
            $row->platform->name ?? '-',
            $row->tone->name ?? '-',
            $row->created_at->format('d-m-Y H:i'), // Format tanggal agar lebih rapi
            route('generate.result', $row->id)
        ];
    }

    /**
     * Ini akan menentukan judul kolom paling atas
     */
    public function headings(): array
    {
        return ['Generated Context', 'Platform', 'Tone', 'Date Created', 'Link'];
    }
}
