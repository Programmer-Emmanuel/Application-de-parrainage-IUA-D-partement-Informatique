<?php

namespace App\Imports;

use App\Models\L1MIAGE;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Str;

class L1MIAGESImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $data = $row->toArray();

        // Ignorer la ligne d'entête
        if ($data[0] === 'matricule') {
            return;
        }

        L1MIAGE::firstOrCreate(
            [
                'email' => $data[3],  // clé unique pour éviter doublons
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
