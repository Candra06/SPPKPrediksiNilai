<?php

namespace App\Imports;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

// use Maatwebsite\Excel\Concerns\ToCollection;

class ImportUser implements ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
                User::create([
                "nip" => $row[0],
                "nuptk" => $row[1],
                "nama" => $row[2],
                "username" => $row[3],
                "role" => $row[5],
                "password" => bcrypt($row[4])
            ]);
        }
    }
}
