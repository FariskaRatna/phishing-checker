<?php

namespace App\Exports;

use App\Models\Phishing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class PhishingReportExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Phishing::query()
        ->leftJoin('ip_logs', 'phishings.ip_address', '=', 'ip_logs.ip')
        ->select(
            'phishings.url',
            'phishings.final_prediction',
            'phishings.final_confidence',
            'phishings.llm_analysis',
            'ip_logs.device',
            'ip_logs.platform',
            'ip_logs.city',
            'ip_logs.region',
            'ip_logs.country'
        )
        ->latest('phishings.created_at')
        ->get();
    }

    public function headings(): array 
    {
        return [
            'URL',
            'Perangkat',
            'Lokasi',
            'Prediksi Final',
            'Confidence Score',
            'Keterangan (Analisis LLM)'
        ];
    }

    public function map($row): array
    {
        $location = implode(', ', array_filter([$row->city, $row->region, $row->country]));

        return [
            $row->url,
            $row->device && $row->platform ? $row->device . ' (' . $row->platform . ')' : 'N/A',
            $location ?: 'N/A',
            $row->final_prediction,
            number_format($row->final_confidence * 100, 2) . '%',
            $row->llm_analysis,
        ];
    }
}
