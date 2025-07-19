<?php

namespace App\Exports;
use App\Models\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComplaintExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Complaint::latest()->get();
    }

    public function map($complaint): array
    {
        return [
            $complaint->id,
            $complaint->name,
            $complaint->email,
            $complaint->message,
            $complaint->created_at->format('Y-m-d H:i'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'Pesan',
            'Tanggal Kirim',
        ];
    }
}
