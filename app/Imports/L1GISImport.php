<?php

namespace App\Imports;

use App\Models\L1GI;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Str;

class L1GISImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $data = $row->toArray();

        if ($data[0] === 'matricule') {
            return;
        }

        L1GI::firstOrCreate(
            [
                'email' => $data[3],   
            ],
            [
                'id'        => Str::uuid(),
                'matricule' => $data[0],
                'nom'       => $data[1],
                'telephone' => $data[2],
            ]
        );
    }
}
