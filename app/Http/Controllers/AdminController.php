<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            "title"=> "Data Pengguna",
            "data"=>Admin::all()
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "nama"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);

        Admin::create($request->all());
        return redirect()->route('pengguna.index')->with('success','Data Admin Berhasil Ditambahkan');
    }
}
