<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mapel::all();
        return view('admin.mapel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mapel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->validate([
                'nama_mapel'=>'required',
                'status'=>'required',
            ]);
            Mapel::create($input);
            return redirect('/mapel')->with('success', 'Berhasil menambahkan mata pelajaran');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Mapel $mapel)
    {

        return view('admin.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        try {
            $input = $request->validate([
                'nama_mapel'=>'required',
                'status'=>'required',
            ]);
            Mapel::where('id', $mapel->id)->update($input);
            return redirect('/mapel')->with('success', 'Berhasil mengubah mata pelajaran');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Mapel $mapel)
    {
        Mapel::where('id', $mapel->id)->delete();
        return redirect('/mapel')->with('success', 'Berhasil menghapus mata pelajaran');
    }
}
