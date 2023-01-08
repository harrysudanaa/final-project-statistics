<?php

namespace App\Imports;

use App\Models\DataTunggal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class DataTunggalImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable;
    public function model(array $row)
    {
        return new DataTunggal([
            'score'  => $row['score'],
        ]);
    }
}
