<?php

namespace App\Http\Controllers;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

    class PendudukController extends Controller
    {
        // 

        public function index()
        {
            return view('penduduk.tabel',[
                "title" => "Penduduk",
                "data" => Penduduk::all()
            ]);
        }

        public function create():View
        {
            return view('penduduk.tambah')->with(["title"=>"Tambah Data Penduduk"]);
        }

        public function store(Request $request): RedirectResponse
        {
            $request->validate([
                "nik"=>"required",
                "nama"=>"required",
                "jenis_kelamin"=>"required",
                "tanggal_lahir"=>"required",
                "agama"=>"required",
                "status"=>"required",
                "pekerjaan"=>"required",
                "alamat"=>"required"
            ]);

            Penduduk::create($request->all());
            return redirect()->route('penduduk.index')->with('succes','Data Penduduk Berhasil Ditambahkan');
        }

        public function edit(Penduduk $penduduk): View
        {
            return view('penduduk.edit',compact('penduduk'))->with(["title"=>"Ubah Data Penduduk"]);
        }

        public function update(Request $request, Penduduk $penduduk):RedirectResponse
        {
            $request->validate([
                "nik"=>"required",
                "nama"=>"required",
                "jenis_kelamin"=>"required",
                "tanggal_lahir"=>"required",
                "agama"=>"required",
                "status"=>"required",
                "pekerjaan"=>"required",
                "alamat"=>"required"
            ]);

            $penduduk->update($request->all());
            return redirect()->route('penduduk.index')->with('updated','Data Penduduk Berhasil Diubah');
        }

        public function show(Penduduk $penduduk):View
        {
            return view('penduduk.tampil',compact('penduduk'))
            ->with(["title"=>"Data Penduduk"]);
        }

        public function destroy($id):RedirectResponse
        {
            Penduduk::where('id',$id)->delete();
            return redirect()->route('penduduk.index')->with('deleted','Data Penduduk Berhasil Dihapus');
        }
    }