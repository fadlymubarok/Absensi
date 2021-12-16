<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombel = Rombel::latest();
        if (request('search')) {
            $rombel->where('nama_rombel', 'like', '%' . request('search') . '%');
        }
        $title = 'Rombel';
        $rombels = $rombel->paginate(5);
        return view('admin.rombels.index', compact('title', 'rombels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Buat data';
        return view('admin.rombels.create', compact('title'));
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
            'nama_rombel' => 'required|unique:rombels|min:5|max:255'
        ]);
        Rombel::create($request->all());
        return redirect('/rombels')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        $title = 'ubah data';
        return view('admin.rombels.edit', compact('title', 'rombel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        $rule = [];
        if ($request['nama_rombel'] != $rombel['nama_rombel']) {
            $rule['nama_rombel'] = 'required|unique:rombels|min:5|max:255';
        }
        $validate = $request->validate($rule);
        $rombel->update($validate);
        return redirect('/rombels')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        $rombel->delete();
        return redirect('/rombels')->with('success', 'Data berhasil dihapus!');
    }
}
