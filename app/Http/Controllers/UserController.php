<?php

namespace App\Http\Controllers;

use App\Imports\ImportUser;
use App\Models\User;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

       $credential =  $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {

            $request->session()->regenerate();
            if (Auth()->user()->role == 'Admin') {
                return redirect()->intended('/dashboard/admin');
            } else {
                return redirect()->intended('/dashboard/pengajar');
            }


        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboardAdmin()
    {
        return view('admin.dashboard');
    }

    public function dashboardPengajar()
    {
        $kelas = Mengajar::where('id_pengajar', Auth::user()->id)->count();

        return view('admin.dashboardPengajar', compact('kelas'));
    }

    public function index()
    {
        $data = User::all();
        return view('pengajar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajar.add');
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
            $request->validate([
                'nip'=>'required',
                'nuptk'=>'required',
                'nama'=>'required',
                'username'=>'required',
                'password'=>'required',
                'role'=>'required',
            ]);
            User::create([
                'nip' => $request->nip,
                'nuptk' => $request->nuptk,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            return redirect('akun')->with('success', 'Berhasil menambah data');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('pengajar.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nip'=>'required',
                'nuptk'=>'required',
                'nama'=>'required',
                'username'=>'required',

                'role'=>'required',
            ]);
            $input = ([
                'nip' => $request->nip,
                'nuptk' => $request->nuptk,
                'nama' => $request->nama,
                'username' => $request->username,
                'role' => $request->role,
            ]);
            if ($request->password) {
                $input['password'] = bcrypt($request->password);
            }
            User::where('id', $id)->update($input);
            return redirect('akun')->with('success', 'Berhasil mengubah data');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/akun')->with('success', 'Berhasil menghapus data');
    }

    public function importView()
    {
        return view('admin.import.importView');
    }

    public function importUsers(Request $request)
    {
        try {
            Excel::import(new ImportUser, $request->file('fileUsers')->store('files'));

            return redirect('/file-import')->with('success', 'Berhasil import data');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
