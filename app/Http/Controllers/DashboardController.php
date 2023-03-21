<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlhPengaduan = Pengaduan::count();
        return view('page.admin.dashboard', compact('jmlhPengaduan'));
    }
}
