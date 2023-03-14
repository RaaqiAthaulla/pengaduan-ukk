<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pengaduan = Pengaduan::all();
        $user = User::all();
        return view('page.admin.pengaduan.index', compact('pengaduan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_user = Auth::id(); // mengambil ID user yang sedang login dari session
        return view('page.admin.pengaduan.create', ['id_user' => $id_user]);
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
            'judul' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'foto-pengaduan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        Pengaduan::create($input);
        // dd($input);
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('page.admin.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('page.admin.pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'foto-pengaduan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
            if ($pengaduan->foto) {
                unlink('foto-pengaduan/' . $pengaduan->foto); // menghapus file gambar lama
            }
        } else {
            unset($input['foto']);
            if ($pengaduan->foto) {
                unlink('foto-pengaduan/' . $pengaduan->foto); // menghapus file gambar lama
            }
        }


        $pengaduan->update($input);

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            unlink('foto-pengaduan/' . $pengaduan->foto); // menghapus file gambar
        }
        $pengaduan->delete(); // menghapus data dari database

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
