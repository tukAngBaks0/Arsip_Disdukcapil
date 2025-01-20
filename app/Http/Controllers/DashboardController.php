<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Admin;
use App\Models\Dokumen;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Penduduk::all();  // Ambil data dari database
        $title = 'Dashboard';    // Set variabel title
        $penduduk = Penduduk::count();  
        $admin = Admin::count();  
        $dokumen = Dokumen::count();  
        return view('dashboard', compact('data', 'title', 'penduduk', 'admin', 'dokumen'));
    }

}
