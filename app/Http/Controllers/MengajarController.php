<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MengajarController extends Controller
{
    public function index()
    {
        $data = Mengajar::join('kelas', 'kelas.id', 'mengajar.id_kelas')
            ->join('mapel', 'mapel.id', 'mengajar.id_mapel')
            ->join('users', 'users.id', 'mengajar.id_pengajar')
            ->select('mengajar.*', 'kelas.kelas', 'kelas.nama_rombel', 'mapel.nama_mapel', 'users.nama')
            ->get();

        return view('admin.mengajar.index', compact('data'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $pengajar = User::where('role', 'Pengajar')->get();

        return view('admin.mengajar.add', compact('kelas', 'mapel', 'pengajar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'mapel' => 'required',
            'pengajar' => 'required',
            'status' => 'required',
        ]);

        try {
            Mengajar::create([
                'id_kelas' => $request->kelas,
                'id_mapel' => $request->mapel,
                'id_pengajar' => $request->pengajar,
                'status' => $request->status,
            ]);
            return redirect('/mengajar')->with('success', 'Berhasil menambah data');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function dataMengajar(Mengajar $mengajar)
    {
        try {

            $data = Mengajar::join('mapel', 'mapel.id', 'mengajar.id_mapel')
                ->join('kelas', 'kelas.id', 'mengajar.id_kelas')
                ->select('mengajar.*', 'kelas.kelas', 'kelas.id as id_kelas', 'kelas.nama_rombel', 'mapel.nama_mapel')
                ->where('mengajar.id_pengajar', Auth()->user()->id)
                ->get();
            return view('admin.mengajar.dataMengajar', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function dataNilai($idKelas)
    {
        try {
            $info = Mengajar::leftJoin('kelas', 'kelas.id', 'mengajar.id_kelas',)
                ->leftJoin('mapel', 'mapel.id', 'mengajar.id_mapel')
                ->select('kelas.kelas', 'kelas.nama_rombel', 'mapel.nama_mapel')
                ->where('mengajar.id', $idKelas)->first();
            $data = Nilai::join('mengajar', 'mengajar.id', 'nilai.id_mengajar')
                ->join('kelas', 'kelas.id', 'mengajar.id_kelas')
                ->join('siswa', 'siswa.id', 'nilai.id_siswa')
                ->join('mapel', 'mapel.id', 'mengajar.id_mapel')
                ->select('siswa.nama_siswa', 'kelas.kelas', 'kelas.nama_rombel', 'nilai.*', 'mapel.nama_mapel')
                ->where('nilai.id_mengajar', $idKelas)
                ->get();

            return view('admin.mengajar.dataNilai', compact('data', 'info', 'idKelas'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function prediksi($idMengajar)
    {
        try {
            $mengajar = Mengajar::where('id', $idMengajar)->first();
            $siswa = Siswa::where('id_kelas', $mengajar->id_kelas)->get();
            $pred = [];
            foreach ($siswa as $sw) {
                $sum = Nilai::where('id_siswa', $sw->id)
                    ->sum('nilai');
                // $periode = Nilai::where('id_siswa', $sw->id)
                //     ->count('nilai');
                $tmp['id_siswa'] = $sw->id;
                $tmp['nama_siswa'] = $sw->nama_siswa;
                $tmp['prediksi'] = $sum / 4;
                array_push($pred, $tmp);
            }
            // return $pred;
            $data = Mengajar::leftJoin('kelas', 'kelas.id', 'mengajar.id_kelas',)
                ->leftJoin('mapel', 'mapel.id', 'mengajar.id_mapel')
                ->select('kelas.kelas', 'kelas.nama_rombel', 'mapel.nama_mapel')
                ->where('mengajar.id', $idMengajar)->first();
            return view('admin.mengajar.dataPrediksi', compact('pred', 'data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Mengajar $mengajar)
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $pengajar = User::where('role', 'Pengajar')->get();
        return view('admin.mengajar.edit', compact('mengajar', 'kelas', 'mapel', 'pengajar'));
    }

    public function update(Request $request, Mengajar $mengajar)
    {
        $request->validate([
            'kelas' => 'required',
            'mapel' => 'required',
            'pengajar' => 'required',
            'status' => 'required',
        ]);

        try {
            Mengajar::where('id', $mengajar->id)->update([
                'id_kelas' => $request->kelas,
                'id_mapel' => $request->mapel,
                'id_pengajar' => $request->pengajar,
                'status' => $request->status,
            ]);
            return redirect('/mengajar')->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            return redirect('/mengajar/add')->with('error', 'Gagal mengubah data');
        }
    }

    public function destroy(Mengajar $mengajar)
    {
        try {
            Mengajar::where('id', $mengajar->id)->delete();
            return redirect('/mengajar')->with('success', 'Berhasil menghapus data');
        } catch (\Throwable $th) {
            return redirect('/mengajar')->with('success', 'Gagal menghapus data');
        }
    }
}
