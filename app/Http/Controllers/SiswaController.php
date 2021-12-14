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
        $siswa = User::where('level', 'siswa')->get();
        $title = 'siswa';
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
        return view('admin.siswa.create', compact('title', 'rombels', 'rayons'));
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
            'username' => 'required|unique:users|min:4|max:255',
            'password' => 'required|min:8|max:255',
            'level' => 'required'
        ]);
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        return redirect('/siswa')->with('success', 'Data siswa berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'ubah data';
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        return view('admin.siswa.edit', compact('title', 'user', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama' => 'required|min:4|max:255',
            'rombel' => 'required',
            'rayon' => 'required',
        ];

        if ($request['nis'] != $user['nis']) {
            $rules['nis'] = 'required|unique:users|min:8|max:10';
        }

        if ($request['username'] != $user['username']) {
            $rules['username'] = 'required|unique:users|min:4|max:255';
        }
        $validate = $request->validate($rules);
        $user->update($validate);
        return redirect('/siswa')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/siswa')->with('success', 'Data berhasil dihapus!');
    }
}
