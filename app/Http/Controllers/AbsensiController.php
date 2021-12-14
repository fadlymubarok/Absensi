<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function absensi_siswa()
    {
        return view('admin.dashboad', compact('user'));
    }
    public function store(Request $request)
    {
        $absen = new Absen;
        $absen->nis = $request->nis;
        $absen->keterangan = $request->keterangan;
        $absen->jam_kedatangan = date('H:i:s');
        $absen->save();
        return redirect('/absensi-siswa2');
    }

    public function absensi_siswa2()
    {
        $carbon = Carbon::now();
        $nis = Auth::user()->nis;
        $absen = Absen::where('nis', $nis)->latest()->first();
        return view('users.absensi2', compact('absen', 'carbon'));
    }
    public function update(Request $request)
    {
        Absen::where('id', $request->id)
            ->update([
                'id' => $request->id,
                'nis' => $request->nis,
                'jam_kepulangan' => $request->jam_kepulangan
            ]);
        return redirect('/absensi-siswa3')->with('success', 'Absen berhasil! Anda bisa logout');
    }

    public function absensi_siswa3()
    {
        $nis = Auth::user()->nis;
        $absen = Absen::where('nis', $nis)->latest()->first();
        return view('users.absensi3', compact('absen'));
    }

    public function absensi_tidak_hadir()
    {
        return view('users.absensi4');
    }
    public function tidak_hadir(Request $request)
    {
        $validate = $request->validate([
            'nis' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        $validate['image'] = $request->file('image')->store('foto-bukti');

        Absen::create($validate);
        return redirect('/absensi-siswa3')->with('success', 'Data berhasil disimpan! Anda bisa logout');
    }
}
