<?php

namespace App\Imports;

use App\Models\L2MIAGE;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Str;

class L2MIAGESImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $data = $row->toArray();

        // Ignorer la ligne d'entête
        if ($data[0] === 'matricule') {
            return;
        }

        // Empêcher les doublons (email unique)
        L2MIAGE::firstOrCreate(
            [
                'email' => $data[3], // champ unique
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
