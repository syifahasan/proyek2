<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQrRequest;
use App\Http\Requests\UpdateQrRequest;

class QrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absen', [
            "title" => "Absen | Absensi",
            "slug" => "absen",
            "users" => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $qrcode = new Generator;
        $value = $qrcode->size(200)->generate(request()->get('value'));
        return view('absen', [
            "title" => "Absen | Absensi",
            "slug" => "absen",
            "users" => User::all(),
            'value' => $value,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qrcode = new Generator;
        $value = $qrcode->size(300)->generate(request()->get('value'));
        $validatedData = $request->validate([
            'value' => 'required',
        ]);

        Qr::create($validatedData);

        return view('absen', [
            "title" => "Absen | Absensi",
            "slug" => "absen",
            "users" => User::all(),
            'value' => $value,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function show(Qr $qr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function edit(Qr $qr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQrRequest  $request
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQrRequest $request, Qr $qr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qr $qr)
    {
        //
    }
}
