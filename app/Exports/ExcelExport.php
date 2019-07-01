<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Transaction;

class ExcelExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Transaction::all();
        foreach ($orders as $row) {
            $order[] = array(
                '0' => $row->id,
                '1' => $row->from_wallet_id,
                '2' => $row->to_wallet_id,
                '3' => $row->values,
                '4' => $row->type,
                '5' => $row->desc,
                '6' => $row->created_at
            );
        }

        return (collect($order));
    }
    public function headings(): array
    {
        return [
            'id',
            'Nguoi gui',
            'Nguoi nhan',
            'Gia tri',
            'Kieu',
            'Mo ta',
            'Ngay thuc hien'
        ];
    }
}
