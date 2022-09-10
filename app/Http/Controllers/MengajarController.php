<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Mengajar;
use App\Models\User;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mengajar::join('kelas', 'kelas.id', 'mengajar.id_kelas')
            ->join('mapel', 'mapel.id', 'mengajar.id_mapel')
            ->join('users', 'users.id', 'mengajar.id_pengajar')
            ->select('mengajar.*', 'kelas.kelas', 'kelas.nama_rombel', 'mapel.nama_mapel', 'users.nama')
            ->get();
            
        return view('admin.mengajar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $pengajar = User::where('role', 'Pengajar')->get();

        return view('admin.mengajar.add', compact('kelas', 'mapel', 'pengajar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function show(Mengajar $mengajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Mengajar $mengajar)
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $pengajar = User::where('role', 'Pengajar')->get();
        return view('admin.mengajar.edit', compact('mengajar','kelas','mapel','pengajar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mengajar  $mengajar
     * @return \Illuminate\Http\Response
     */
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
