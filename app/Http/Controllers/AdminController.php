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
        $admins = User::where('level', 'admin');
        if (request('search')) {
            $admins->where('username', 'like', '%' . request('search') . '%')
                ->orWhere('nama', 'like', '%' . request('search') . '%')
                ->orWhere('alamat', 'like', '%' . request('search') . '%');
        }
        $title = 'Admin';
        $admin = $admins->get();
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
}
