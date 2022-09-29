<?php

namespace App\Http\Controllers;

use App\Imports\ImportSiswa;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{

    public function index()
    {
        $data = Siswa::leftJoin('kelas', 'kelas.id', 'siswa.id_kelas')
            ->select('siswa.*', 'kelas.kelas', 'kelas.nama_rombel')
            ->get();
        return view('admin.siswa.index', compact('data'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.add', compact('kelas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_siswa' => 'required',
                'kelas' => 'required',
                'status' => 'required',
                'nis' => 'required',
            ]);
            Siswa::create([
                'nama_siswa' => $request->nama_siswa,
                'id_kelas' => $request->kelas,
                'status' => $request->status,
                'nis' => $request->nis,
            ]);
            return redirect('siswa')->with('success', 'Berhasil menambah data');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {

        try {
            $request->validate([
                'nama_siswa' => 'required',
                'kelas' => 'required',
                'status' => 'required',
                'nis' => 'required',
            ]);
            Siswa::where('id', $siswa->id)->update([
                'nama_siswa' => $request->nama_siswa,
                'id_kelas' => $request->kelas,
                'status' => $request->status,
                'nis' => $request->nis,
            ]);
            return redirect('siswa')->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function destroy(Siswa $siswa)
    {
        Siswa::where('id', $siswa->id)->delete();
        return redirect('/siswa')->with('success', 'Berhasil menghapus data');
    }

    public function importSiswa(Request $request)
    {
        try {
            Excel::import(new ImportSiswa, $request->file('fileSiswa')->store('files'));

            return redirect('/file-import')->with('success', 'Berhasil import data');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
