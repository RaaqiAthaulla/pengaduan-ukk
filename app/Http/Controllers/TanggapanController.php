<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\View\Components\Alert;


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
        return view('page.admin.tanggapan.add', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pengaduan $pengaduan)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd(\App\Models\user::first()->pengaduan);
        DB::table('pengaduan')->where('id', $request->id_pengaduan)->update([
            'status' => 'selesai',
        ]);


        $item = $request->all();

        $item['id_pengaduan'] = $request->id_pengaduan;
        $item['id_petugas'] = auth()->user()->id;
        $item['tanggapan'] = $request->isi_tanggapan;
        $item['tgl_tanggapan'] = date('y-m-d');
        // $item['petugas_id'] = $petugas_id;


        Tanggapan::create($item);
        return redirect('pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pengaduan::findOrFail($id);

        return view('page.admin.tanggapan.add', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
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
