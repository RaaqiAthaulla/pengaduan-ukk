<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $petugas = Petugas::all();
        // return view('page.admin.petugas.index', compact('petugas'));
        $user = User::RolePetugas()->get();
        return view('page.admin.petugas.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.petugas.add');
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
            'nik' => 'required',
            'nama' => 'required',
            'tlp' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->nik = $request->nik;
        $user->nama = $request->nama;
        $user->tlp = $request->tlp;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'Petugas';
        $user->save();

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = User::find($id);
        return view('page.admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tlp' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $petugas = User::find($id);
        $petugas->nik = $request->nik;
        $petugas->nama = $request->nama;
        $petugas->tlp = $request->tlp;
        $petugas->email = $request->email;
        if ($request->filled('password')) {
            $petugas->password = bcrypt($request->password);
        }
        $petugas->save();
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
