<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('level', 'admin')->get();
        $title = 'Admin';
        return view('admin.admin.index', compact('admin', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'buat data';
        return view('admin.admin.create', compact('title'));
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
            'nama' => 'required|min:5|max:255',
            'tanggal_lahir' => 'required',
            'alamat' => 'required|min:15|max:255',
            'username' => 'required|unique:users|min:5|max:255',
            'password' => 'required|min:8|max:255',
            'level' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        return redirect('/admins')->with('success', 'Data Admin berhasil disimpan!');
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
        $title = 'Ubah data';
        $admin = $user;
        return view('admin.admin.edit', compact('admin', $admin, 'title'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user::destroy($user->id);
        return redirect('/admins')->with('success', 'Data berhasil dihapus!');
    }
}
