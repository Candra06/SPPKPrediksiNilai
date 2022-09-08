<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $data = Siswa::all();
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
}
