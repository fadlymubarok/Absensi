<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = User::where('level', 'siswa')->latest();
        if (request('search')) {
            $siswas->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('nis', 'like', '%' . request('search') . '%')
                ->orWhere('rombel', 'like', '%' . request('search') . '%')
                ->orWhere('rayon', 'like', '%' . request('search') . '%');
        }
        $title = 'siswa';
        $siswa = $siswas->get();
        return view('admin.siswa.index', compact('siswa', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'buat data';
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $cek = User::count();
        if ($cek != 0) {
            $ambil = User::all()->last();
            $urut = (int)substr($ambil->nis, 7) + 1;
            $nomer = 1190709 . $urut;
        }
        return view('admin.siswa.create', compact('title', 'rombels', 'rayons', 'nomer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nis' => 'required|unique:users|min:8|max:10',
            'nama' => 'required|min:4|max:255',
            'rombel' => 'required',
            'rayon' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|min:15|max:255',
            'username' => 'required|unique:users|min:4|max:255',
            'password' => 'required|min:8|max:255',
            'level' => 'required'
        ]);
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        return redirect('/siswa')->with('success', 'Data siswa berhasil disimpan!');
    }
}
