<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dosen.dosen',[
            "title" => "Admin Dosen | Web Absensi Mahasiswa",
            "dosens" => DB::table('dosens')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosen.createdosen',[
            "title" => "Admin Dosen | Web Absensi Mahasiswa",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|unique:dosens',
            'nama' => 'required',
        ]);

        Dosen::create($validatedData);

        return redirect('/admin/dosen')->with('success', 'Dosen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('admin.dosen.editdosen',[
            "dosen" => $dosen,
            "title" => "Admin Dosen | Web Absensi Mahasiswa",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        $rules = [
            'nama' => 'required',
        ];

        if($request->nip != $dosen->nip){
            $rules['nip'] = 'required|unique:dosens';
        }
        $validatedData = $request->validate($rules);

        Dosen::where('id', $dosen->id)
            ->update($validatedData);

        return redirect('/admin/dosen')->with('success', 'Data dosen berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        Dosen::destroy($dosen->id);

        return redirect('/admin/dosen')->with('success', 'Data dosen berhasil dihapus');
    }
}
