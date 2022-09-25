<?php

namespace App\Imports;

use App\Models\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportNilai implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Nilai::create([
                "id_siswa" => $row[0],
                "id_mengajar" => $row[1],
                "nilai" => $row[2],
                "periode" => $row[3],
            ]);
        }
    }
}
