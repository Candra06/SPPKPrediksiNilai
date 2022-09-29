<?php

namespace App\Http\Controllers;

use App\Imports\ImportNilai;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{

    public function index()
    {
        $data = Nilai::join('mengajar', 'mengajar.id', 'nilai.id_mengajar')
            ->join('mapel', 'mapel.id', 'mengajar.id_mapel')
            ->join('kelas', 'kelas.id', 'mengajar.id_kelas')
            ->select(DB::raw('COUNT(nilai.id_mengajar)'), 'nilai.id_mengajar', 'kelas.kelas', 'kelas.nama_rombel', 'mapel.nama_mapel', 'nilai.periode')
            ->groupBy('nilai.id_mengajar', 'nilai.periode')
            ->get();
        $kelas = Kelas::all();
        $mapel = Mapel::all();

        return view('admin.nilai.index', compact('kelas', 'mapel', 'data'));
    }

    public function inputBy(Request $request)
    {
        $data = Mengajar::leftJoin('mapel', 'mapel.id', 'mengajar.id_mapel')
            ->leftJoin('kelas', 'kelas.id', 'mengajar.id_kelas')
            ->where('mengajar.id_kelas', $request->kelas)
            ->where('mengajar.id_mapel', $request->mapel)
            ->select('mengajar.id', 'mapel.nama_mapel', 'kelas.kelas', 'kelas.nama_rombel')
            ->first();
        $data['periode'] = $request->periode;
        $siswa = Siswa::where('id_kelas', $request->kelas)->get();
        return view('admin.nilai.add', compact('data', 'siswa'));
    }

    public function detail($mengajar, $periode)
    {
        $data = Nilai::leftJoin('mengajar', 'mengajar.id', 'nilai.id_mengajar')
            ->leftJoin('kelas', 'kelas.id', 'mengajar.id_kelas')
            ->leftJoin('mapel', 'mapel.id', 'mengajar.id_mapel')
            ->leftJoin('siswa', 'siswa.id', 'nilai.id_siswa')
            ->select('siswa.nama_siswa', 'nilai.nilai', 'mapel.nama_mapel', 'kelas.kelas', 'kelas.id as id_kelas', 'nilai.id', 'kelas.nama_rombel', 'nilai.periode', 'nilai.id_mengajar')
            ->where('nilai.id_mengajar', $mengajar)
            ->where('nilai.periode', $periode)
            ->get();
        $siswa = Siswa::where('id_kelas', $data[0]->id_kelas)->get();
        return view('admin.nilai.detail', compact('data', 'siswa'));

    }

    public function input(Request $request)
    {
        try {
            Nilai::create([
                'periode' => $request->periode,
                'id_mengajar' => $request->mengajar,
                'id_siswa' => $request->siswa,
                'nilai' => $request->nilai,
            ]);

            return redirect('/detailNilai/' . $request->mengajar.'/'.$request->periode,)->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'periode' => 'required',
                'id_mengajar' => 'required',
                'nilai' => 'required',
            ]);
            for ($i = 0; $i < count($request->id); $i++) {
                Nilai::create([
                    'periode' => $request->periode,
                    'id_mengajar' => $request->id_mengajar,
                    'id_siswa' => $request->id[$i],
                    'nilai' => $request->nilai[$i],
                ]);
            }

            return redirect('/nilai')->with('success', 'Berhasil menambah data');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Nilai $nilai)
    {
        $data = Nilai::leftJoin('mengajar', 'mengajar.id', 'nilai.id_mengajar')
            ->leftJoin('kelas', 'kelas.id', 'mengajar.id_kelas')
            ->leftJoin('mapel', 'mapel.id', 'mengajar.id_mapel')
            ->leftJoin('siswa', 'siswa.id', 'nilai.id_siswa')
            ->select('siswa.nama_siswa', 'nilai.nilai', 'mapel.nama_mapel', 'kelas.kelas', 'kelas.id as id_kelas', 'nilai.id', 'kelas.nama_rombel', 'nilai.periode', 'nilai.id_mengajar')
            ->where('nilai.id_mengajar', $nilai->id_mengajar)
            ->where('nilai.periode', $nilai->periode)
            ->get();
        $siswa = Siswa::where('id_kelas', $data[0]->id_kelas)->get();
        return view('admin.nilai.detail', compact('data', 'siswa'));
    }

    public function edit(Nilai $nilai)
    {
        //
    }

    public function update(Request $request, Nilai $nilai)
    {

        try {
            Nilai::where('id', $request->id)->update(['nilai'=>$request->nilai]);
            return redirect('/detailNilai/' . $nilai->id_mengajar.'/'.$nilai->periode,)->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Nilai $nilai)
    {
        try {
            Nilai::where('id', $nilai->id)->delete();
            return redirect('/detailNilai/' . $nilai->id_mengajar.'/'.$nilai->periode,)->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return redirect('/detailNilai/' . $nilai->id_mengajar.'/'.$nilai->periode,)->with('success', 'Gagal menghapus data');
        }
    }

    public function importNilai(Request $request)
    {
        try {
            Excel::import(new ImportNilai, $request->file('fileNilai')->store('files'));

            return redirect('/file-import')->with('success', 'Berhasil import data');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
