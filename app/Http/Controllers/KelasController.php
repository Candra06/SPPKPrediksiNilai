<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('admin.kelas.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kelas.add');
    }


    public function store(Request $request)
    {
        try {
            $input = $request->validate([
                'kelas'=>'required',
                'nama_rombel'=>'required',
                'status'=>'required',
            ]);
            Kelas::create($input);
            return redirect('/kelas')->with('success', 'Berhasil menambahkan kelas');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $input = $request->validate([
                'kelas'=>'required',
                'nama_rombel'=>'required',
                'status'=>'required',
            ]);
            Kelas::where('id', $id)->update($input);
            return redirect('/kelas')->with('success', 'Berhasil mengubah kelas');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($kelas)
    {
        Kelas::where('id', $kelas)->delete();
        return redirect('/kelas')->with('success', 'Berhasil menghapus kelas');
    }
}
