<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $pengaduan = Pengaduan::all();
        $user = User::all();

        $pengaduan = Pengaduan::orderBy('id', 'desc')->paginate(10);

        return view('page.admin.pengaduan.index', compact('pengaduan', 'user'));
    }

    public function indexmasyarakat()
    {
        $id_user = Auth::id();
        $user = User::find($id_user);

        $pengaduan = Pengaduan::where('id_user', $id_user)->orderBy('id', 'desc')->paginate(10);
        // dd($pengaduan);
        return view('page.masyarakat.pengaduan.index', compact('pengaduan', 'user'));
    }


    public function dashboard()
    {
        $jmlhPengaduan = Pengaduan::count();
        return view('page.admin.dashboard', compact('jmlhPengaduan'));
    }

    public function create()
    {
        $id_user = Auth::id(); // mengambil ID user yang sedang login dari session
        return view('page.masyarakat.pengaduan.add', ['id_user' => $id_user]);

        // $id_user = Auth::id(); // mengambil ID user yang sedang login dari session
        // return view('page.masyarakat.pengaduan.add', compact('id_user'));
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
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $input = $request->all();
        $input['id_user'] = auth()->user()->id;

        if ($image = $request->file('foto')) {
            $destinationPath = 'foto-pengaduan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        $pengaduan = Pengaduan::create($input);
        // if (auth()->user()->role == 'Admin') {
        //     return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil disimpan.');
        return redirect()->route('pengaduanmasyarakat')->with('success', 'Pengaduan berhasil disimpan.');
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

    public function showmasyarakat(Pengaduan $pengaduan)
    {

        $tanggapan = $pengaduan->tanggapan;
        return view('page.masyarakat.pengaduan.show', compact('pengaduan', 'tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */


    public function edit(Pengaduan $pengaduan)
    {
        if ($pengaduan->status != 'belum diproses') {
            return redirect()->back()->with('error', 'Maaf, Anda tidak diizinkan untuk mengedit pengaduan ini karena status pengaduan sudah diubah.');
        }
        return view('page.masyarakat.pengaduan.update', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $destinationPath = 'foto-pengaduan/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        $pengaduan->update($input);

        return redirect()->route('pengaduanmasyarakat')->with('success', 'Pengaduan berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->tanggapan) {
            $pengaduan->tanggapan()->delete(); // menghapus data tanggapan terkait
        }
        if ($pengaduan->foto) {
            unlink('foto-pengaduan/' . $pengaduan->foto); // menghapus file gambar
        }
        $pengaduan->delete(); // menghapus data pengaduan dari database

        return redirect()->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function destroymasyarakat(Pengaduan $pengaduan)
    {
        if ($pengaduan->status == 'Selesai') {
            if ($pengaduan->foto) {
                unlink('foto-pengaduan/' . $pengaduan->foto); // menghapus file gambar
            }
            if ($pengaduan->tanggapan) {
                $pengaduan->tanggapan()->delete(); // menghapus data tanggapan terkait
            }
            $pengaduan->delete(); // menghapus data pengaduan dari database
            return redirect()->route('pengaduanmasyarakat')
                ->with('success', 'Pengaduan berhasil dihapus.');
        } elseif ($pengaduan->status == 'Belum Di Proses' || $pengaduan->status == 'Sedang Di Proses') {
            return redirect()->route('pengaduanmasyarakat')
                ->with('error', 'Pengaduan tidak dapat dihapus karena status masih ' . $pengaduan->status);
        } else {
            return redirect()->route('pengaduanmasyarakat')
                ->with('error', 'Pengaduan tidak dapat dihapus karena status tidak valid.');
        }
    }





    public function search(Request $request)
    {
        $search = $request->input('search');
        $pengaduan = Pengaduan::where('judul', 'like', '%' . $request->search . '%')
            ->orWhere('isi_laporan', 'like', '%' . $request->search . '%')
            ->get();


        return view('page.admin.pengaduan.index', compact('pengaduan'));
    }



    public function ubahStatus(Request $request, Pengaduan $pengaduan)
    {
        $data = ['status' => 'Sedang Di Proses'];

        $pengaduan->update($data);

        return redirect()->back();
    }
}
