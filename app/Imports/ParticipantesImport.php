<?php

namespace App\Imports;

use App\Models\Participante;
use Maatwebsite\Excel\Concerns\ToModel;

class ParticipantesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Participante([
            'nombre' =>$row[1],
            'apPaterno' => $row[2],
            'apMaterno' => $row[3]
        ]);
    }
}
