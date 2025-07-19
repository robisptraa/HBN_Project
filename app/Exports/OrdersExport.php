<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Order::with(['user', 'package'])->latest()->get();
    }

    public function map($order): array
    {
        return [
            $order->id,
            $order->user->name ?? '-',
            $order->package->title ?? '-',
            $order->status,
            $order->created_at->format('Y-m-d H:i'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama User',
            'Paket',
            'Status',
            'Tanggal Order',
        ];
    }
}
