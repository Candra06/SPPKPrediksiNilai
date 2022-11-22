<?php

namespace App\Imports;

use App\Models\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportNilaiMultiple implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) { //periode 1
            Nilai::create([
                "id_siswa" => $row[0],
                "id_mengajar" => 74,
                "nilai" => $row[18],
                "periode" => 1,
            ]);
        }
        foreach ($rows as $row) { //periode 2
            Nilai::create([
                "id_siswa" => $row[0],
                "id_mengajar" => 74,
                "nilai" => $row[19],
                "periode" => 2,
            ]);
        }
        foreach ($rows as $row) { //periode 3
            Nilai::create([
                "id_siswa" => $row[0],
                "id_mengajar" => 74,
                "nilai" => $row[20],
                "periode" => 3,
            ]);
        }
        foreach ($rows as $row) { //periode 4
            Nilai::create([
                "id_siswa" => $row[0],
                "id_mengajar" => 74,
                "nilai" => $row[21],
                "periode" => 4,
            ]);
        }
    }
}
