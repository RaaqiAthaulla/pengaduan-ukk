<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::with('user')->paginate(10);
        return view('page.admin.laporan', compact('pengaduan'));
        // $user = User::all();
        // return view('page.admin.laporan', compact('user'));
    }

    public function ExportPDF()
    {
        $list = Pengaduan::all();
        $pdf = new Dompdf();
        $pdf->loadHtml(view('page.admin.pdf', compact('list')));
        $pdf->setPaper('A4', 'lanscape');
        $pdf->render();
        return $pdf->stream('Pengaduan.pdf');
    }
}
