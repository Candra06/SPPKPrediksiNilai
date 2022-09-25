<?php

namespace App\Imports;

use App\Models\Siswa;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportSiswa implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Siswa::create([
                "nis" => $row[0],
                "nama_siswa" => $row[1],
                "id_kelas" => $row[2],
                "status" => $row[3],
            ]);
        }
    }
}
