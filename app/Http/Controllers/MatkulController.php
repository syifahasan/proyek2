<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMatkulRequest;
use App\Http\Requests\UpdateMatkulRequest;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.matkul.matkul',[
            "title" => "Admin Matkul | Web Absensi Mahasiswa",
            "matkuls" => DB::table('matkuls')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matkul.creatematkul',[
            "title" => "Admin Matkul | Web Absensi Mahasiswa",
            "dosens" => Dosen::all(),
            "semesters" => Semester::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatkulRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kodematkul' => 'required|unique:matkuls',
            'dosen_id' => 'required',
            'semester_id' => 'required',
            'nama' => 'required',
        ]);

        Matkul::create($validatedData);

        return redirect('/admin/matkul')->with('success', 'Matkul berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(Matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit(Matkul $matkul)
    {
        return view('admin.matkul.editmatkul',[
            "matkul" => $matkul,
            "title" => "Admin Matkul | Web Absensi Mahasiswa",
            "dosens" => Dosen::all(),
            "semesters" => Semester::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatkulRequest  $request
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matkul $matkul)
    {
        $rules = [
            'nama' => 'required',
            'dosen_id' => 'required',
            'semester_id' => 'required',
        ];

        if($request->kodematkul != $matkul->kodematkul){
            $rules['kodematkul'] = 'required|unique:matkuls';
        }
        $validatedData = $request->validate($rules);

        Matkul::where('id', $matkul->id)
            ->update($validatedData);

        return redirect('/admin/matkul')->with('success', 'Matkul berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matkul $matkul)
    {
        Matkul::destroy($matkul->id);

        return redirect('/admin/matkul')->with('success', 'Matkul berhasil dihapus');
    }
}
