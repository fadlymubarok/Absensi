<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Rayon;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayon = Rayon::latest();
        if (request('search')) {
            $rayon->where('nama_rayon', 'like', '%' . request('search') . '%')
                ->orWhere('nama_pembimbing', 'like', '%' . request('search') . '%');
        }
        $title = 'Rayon';
        $rayons = $rayon->paginate(5);
        return view('admin.rayons.index', compact('title', 'rayons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'data baru';
        return view('admin.rayons.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_rayon' => 'required|unique:rayons|min:5|max:255',
            'nama_pembimbing' => 'required|min:5|max:255'
        ]);

        Rayon::create($request->all());
        return redirect('/rayons')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon)
    {
        $title = 'ubah data';
        return view('admin.rayons.edit', compact('title', 'rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rayon $rayon)
    {
        $rule = [
            'nama_pembimbing' => 'required|min:5|max:255'
        ];
        if ($request['nama_rayon'] != $rayon['nama_rayon']) {
            $rule['nama_rayon'] = 'required|unique:rayons|min:5|max:255';
        };
        $validate = $request->validate($rule);
        $rayon->update($validate);
        return redirect('/rayons')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return redirect('/rayons')->with('success', 'Data berhasil dihapus!');
    }
}
