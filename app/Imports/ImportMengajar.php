<?php

namespace App\Imports;

use App\Models\Mengajar;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMengajar implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Mengajar::create([
                "id_kelas" => $row[0],
                "id_mapel" => $row[1],
                "id_pengajar" => $row[2],
                "status" => $row[3],
            ]);
        }
    }
}
