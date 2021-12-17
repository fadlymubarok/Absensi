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
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }
    public function store(Request $request)
    {
        $today = Carbon::today();
        $absen = new Absen;
        $absen->nis = $request->nis;
        $absen->keterangan = $request->keterangan;
        $absen->jam_kedatangan = date('H:i:s');
        $absen->tanggal = $today;
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
    public function update()
    {
        $nis = Auth::user()->nis;
        Absen::where('nis', $nis)
            ->update([
                'jam_kepulangan' => date('H:i:s')
            ]);
        return redirect('/dashboard-siswa')->with('success', 'Data berhasil disimpan!');
    }

    public function dashboard_siswa()
    {
        $nis = Auth::user()->nis;
        $absens = Absen::where('nis', $nis)->latest();
        if (request('search')) {
            $absens->where('keterangan', 'like', '%' . request('search') . '%')
                ->orWhere('tanggal', 'like', '%' . request('search') . '%');
        }
        $absen = $absens->get();
        return view('users.dashboardSiswa', compact('absen'));
    }
    public function destroy()
    {
        //
    }

    public function absensi_tidak_hadir()
    {
        $today = date('Y-m-d');
        return view('users.absensi4', compact('today'));
    }
    public function tidak_hadir(Request $request)
    {
        $validate = $request->validate([
            'nis' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image|file|max:1024',
            'tanggal' => 'required'
        ]);

        $validate['image'] = $request->file('image')->store('foto-bukti');

        Absen::create($validate);
        return redirect('/dashboard-siswa')->with('success', 'Data berhasil disimpan!');
    }
}
