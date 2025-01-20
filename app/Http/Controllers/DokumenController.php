<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Penduduk; // Pastikan model Penduduk di-import
use App\Models\Admin;    // Pastikan model Admin di-import
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Storage;

class DokumenController extends Controller
{
    /**
     * Menampilkan daftar dokumen.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dokumen = Dokumen::all();  // Mengambil semua data dokumen
        return view('dokumen.index', [
            'title' => 'Dokumen',
            'data' => $dokumen
        ]);
    }

    /**
     * Menampilkan form untuk menambah data dokumen.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        // Mengambil data penduduk dan admin
        $penduduk = Penduduk::all();  // Mengambil semua data penduduk
        $admin = Admin::all();        // Mengambil semua data admin

        return view('dokumen.create')->with([
            'title' => 'Tambah Data Dokumen',
            'penduduk' => $penduduk,   // Mengirim data penduduk ke view
            'admin' => $admin          // Mengirim data admin ke view
        ]);
    }

    /**
     * Menyimpan data dokumen yang baru ditambahkan.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'penduduk_id' => 'required|exists:penduduks,id',
        'admin_id' => 'required|exists:admins,id',
        'kk' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'kia' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'surat_pindah' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'surat_kehilangan' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'akta_kelahiran' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'akta_kematian' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'akta_perkawinan' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'akta_perceraian' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $data = $request->all();

    // Proses upload file hanya jika file ada
    if ($request->hasFile('kk')) {
        $data['kk'] = $request->file('kk')->store('dokumen', 'public');
    } else {
        $data['kk'] = null;  // Set null jika tidak ada file yang diupload
    }

    if ($request->hasFile('ktp')) {
        $data['ktp'] = $request->file('ktp')->store('dokumen', 'public');
    } else {
        $data['ktp'] = null;  // Set null jika tidak ada file yang diupload
    }

    if ($request->hasFile('kia')) {
        $data['kia'] = $request->file('kia')->store('dokumen', 'public');
    } else {
        $data['kia'] = null;  // Set null jika tidak ada file yang diupload
    }

    if ($request->hasFile('surat_pindah')) {
        $data['surat_pindah'] = $request->file('surat_pindah')->store('dokumen', 'public');
    } else {
        $data['surat_pindah'] = null;
    }

    if ($request->hasFile('surat_kehilangan')) {
        $data['surat_kehilangan'] = $request->file('surat_kehilangan')->store('dokumen', 'public');
    } else {
        $data['surat_kehilangan'] = null;
    }

    if ($request->hasFile('akta_kelahiran')) {
        $data['akta_kelahiran'] = $request->file('akta_kelahiran')->store('dokumen', 'public');
    } else {
        $data['akta_kelahiran'] = null;
    }

    if ($request->hasFile('akta_kematian')) {
        $data['akta_kematian'] = $request->file('akta_kematian')->store('dokumen', 'public');
    } else {
        $data['akta_kematian'] = null;
    }

    if ($request->hasFile('akta_perkawinan')) {
        $data['akta_perkawinan'] = $request->file('akta_perkawinan')->store('dokumen', 'public');
    } else {
        $data['akta_perkawinan'] = null;
    }

    if ($request->hasFile('akta_perceraian')) {
        $data['akta_perceraian'] = $request->file('akta_perceraian')->store('dokumen', 'public');
    } else {
        $data['akta_perceraian'] = null;
    }

    // Simpan data dokumen ke database
    Dokumen::create($data);

    // Redirect dengan pesan sukses
    return redirect()->route('dokumen.index')->with('success', 'Data Dokumen Berhasil Ditambahkan');
}

/**
     * Menampilkan file yang di-upload (misalnya foto) untuk dilihat.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function viewFile($filename)
    {
        // Memastikan file ada di storage
        $filePath = storage_path('app/public/dokumen/' . $filename);

        if (file_exists($filePath)) {
            // Mengembalikan file gambar untuk dilihat di browser
            return response()->file($filePath);
        } else {
            abort(404, 'File tidak ditemukan.');
        }
    }

    /**
     * Menyediakan file untuk diunduh.
     *
     * @param  string  $filename
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($filename)
    {
        // Memastikan file ada di storage
        $filePath = storage_path('app/public/dokumen/' . $filename);

        if (file_exists($filePath)) {
            // Mengembalikan file untuk diunduh
            return response()->download($filePath);
        } else {
            abort(404, 'File tidak ditemukan.');
        }
    }

    public function edit(Dokumen $dokuman): View
{
    $penduduk = Penduduk::all();  // Mengambil semua data penduduk
    $admin = Admin::all();        // Mengambil semua data admin

    return view('dokumen.edit', compact('dokuman'))->with([
        'title' => 'Ubah Data Dokumen',
        'penduduk' => $penduduk,   // Mengirim data penduduk ke view
        'admin' => $admin          // Mengirim data admin ke view
    ]);
}

public function update(Dokumen $dokuman, Request $request): RedirectResponse
{
    $request->validate([
        "penduduk_id" => "required|exists:penduduks,id",
        "admin_id" => "required|exists:admins,id",
        "kk" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "ktp" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "kia" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "surat_pindah" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "surat_kehilangan" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "akta_kelahiran" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "akta_kematian" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "akta_perkawinan" => "nullable|image|mimes:jpeg,png,jpg,gif",
        "akta_perceraian" => "nullable|image|mimes:jpeg,png,jpg,gif",
    ]);

    $data = $request->all();
    
        // Proses upload file hanya jika file ada
        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('dokumen', 'public');
        } else {
            $data['kk'] = null;  // Set null jika tidak ada file yang diupload
        }
    
        if ($request->hasFile('ktp')) {
            $data['ktp'] = $request->file('ktp')->store('dokumen', 'public');
        } else {
            $data['ktp'] = null;  // Set null jika tidak ada file yang diupload
        }
    
        if ($request->hasFile('kia')) {
            $data['kia'] = $request->file('kia')->store('dokumen', 'public');
        } else {
            $data['kia'] = null;  // Set null jika tidak ada file yang diupload
        }
    
        if ($request->hasFile('surat_pindah')) {
            $data['surat_pindah'] = $request->file('surat_pindah')->store('dokumen', 'public');
        } else {
            $data['surat_pindah'] = null;
        }
    
        if ($request->hasFile('surat_kehilangan')) {
            $data['surat_kehilangan'] = $request->file('surat_kehilangan')->store('dokumen', 'public');
        } else {
            $data['surat_kehilangan'] = null;
        }
    
        if ($request->hasFile('akta_kelahiran')) {
            $data['akta_kelahiran'] = $request->file('akta_kelahiran')->store('dokumen', 'public');
        } else {
            $data['akta_kelahiran'] = null;
        }
    
        if ($request->hasFile('akta_kematian')) {
            $data['akta_kematian'] = $request->file('akta_kematian')->store('dokumen', 'public');
        } else {
            $data['akta_kematian'] = null;
        }
    
        if ($request->hasFile('akta_perkawinan')) {
            $data['akta_perkawinan'] = $request->file('akta_perkawinan')->store('dokumen', 'public');
        } else {
            $data['akta_perkawinan'] = null;
        }
    
        if ($request->hasFile('akta_perceraian')) {
            $data['akta_perceraian'] = $request->file('akta_perceraian')->store('dokumen', 'public');
        } else {
            $data['akta_perceraian'] = null;
        }

        $dokuman->update($data);
        return redirect()->route('dokumen.index')->with('update','Data Dokumen Berhasil Diubah');
    }

    public function show():View
    {
        $dokumen=Dokumen::all();
        return view('dokumen.show')->with([
            "title"=>"Tampil Data Dokumen",
            "data"=>$dokumen
        ]);
    }

    public function destroy($id):RedirectResponse
    {
        Dokumen::where('id',$id)->delete();
        return redirect()->route('dokumen.index')->with('deleted','Data Dokumen Berhasil Dihapus');
    }
}
