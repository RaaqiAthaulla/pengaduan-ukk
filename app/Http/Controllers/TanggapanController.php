<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\tanggapan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = Tanggapan::all();
        return view('tanggapan.index', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pengaduan $pengaduan)
    {
        $pengaduan = Pengaduan::where('status', '!=', 'selesai')->get();
        $petugas = Petugas::all();
        return view('tanggapan.create', compact('pengaduan', 'petugas'));
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
            'pengaduan_id' => 'required',
            'petugas_id' => 'required',
            'tanggapan' => 'required'
        ]);

        $tanggapan = Tanggapan::create([
            'pengaduan_id' => $request->pengaduan_id,
            'petugas_id' => $request->petugas_id,
            'tanggapan' => $request->tanggapan
        ]);

        $pengaduan = Pengaduan::findOrFail($request->pengaduan_id);
        $pengaduan->update([
            'status' => 'selesai'
        ]);

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(tanggapan $tanggapan, $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        return view('tanggapan.show', compact('tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(tanggapan $tanggapan, $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $pengaduan = Pengaduan::where('status', '!=', 'selesai')->get();
        $petugas = Petugas::all();
        return view('tanggapan.edit', compact('tanggapan', 'pengaduan', 'petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tanggapan $tanggapan, $id)
    {
        $request->validate([
            'pengaduan_id' => 'required',
            'petugas_id' => 'required',
            'tanggapan' => 'required'
        ]);

        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->update([
            'pengaduan_id' => $request->pengaduan_id,
            'petugas_id' => $request->petugas_id,
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tanggapan $tanggapan, $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->delete();

        return redirect()->route('tanggapan.index')
            ->with('success', 'Tanggapan berhasil dihapus.');
    }
}
