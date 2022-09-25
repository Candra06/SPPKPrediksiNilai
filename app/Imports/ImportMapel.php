<?php

namespace App\Imports;

use App\Models\Mapel;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

// use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMapel implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
                Mapel::create([
                "nama_mapel" => $row[0],
                "status" => $row[1],
            ]);
        }
    }
}
