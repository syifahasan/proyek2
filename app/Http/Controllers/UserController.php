<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home()
    {
        return view('home', [
            "title" => "Home | Absensi",
            "slug" => "home",
            "users" => User::select('select name from users')
        ]);
    }

    public function d3tia(){
        return view('admin.mhs.d3tia', [
            "title" => "D3TI.A | Datas",
            "slug" => "mhs",
            "users" => User::all()->where('kelas_id', 1)
        ]);
    }

    public function d3tib(){
        return view('admin.mhs.d3tib', [
            "title" => "D3TI.B | Datas",
            "slug" => "mhs",
            "users" => User::all()->where('kelas_id', 2)
        ]);
    }

    public function d3tic(){
        return view('admin.mhs.d3tic', [
            "title" => "D3TI.C | Datas",
            "slug" => "mhs",
            "users" => User::all()
        ]);
    }

    public function index(){
        return view('admin.mhs.d3tib', [
            "title" => "D3TI.B | Datas",
            "slug" => "mhs",
            "users" => User::all()->where('kelas_id', 2)
        ]);
    }

    public function create()
    {
        return view('admin.mhs.createmhs',[
            "title" => "Admin Mhs | Web Absensi Mahasiswa",
            "kelases" => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hash::make($request->password);

        $validatedData = $request->validate([
            'nim' => 'required|unique:users',
            'kelas_id' => 'required',
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);

        User::create($validatedData);

        return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect('admin/mhs/')->with('success', 'Matkul berhasil dihapus');
    }
}
