<?php

namespace App\Imports;

use App\Models\Kelas;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportKelas  implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Kelas::create([
                "kelas" => $row[0],
                "nama_rombel" => $row[1],
                "status" => $row[2],
            ]);
        }
    }
}
