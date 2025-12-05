<?php

namespace App\Imports;

use App\Models\L2GI;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Str;

class L2GISImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $data = $row->toArray();

        // Ignorer la ligne d'entête
        if ($data[0] === 'matricule') {
            return;
        }

        L2GI::firstOrCreate(
            [
                'email' => $data[3], // clé unique pour éviter les doublons
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
