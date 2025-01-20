@extends('layouts.template') 
@section('judulh1','Admin - Penduduk') 
 
@section('konten') 
<div class="col-md-6"> 
    @if ($errors->any()) 
    <div class="alert alert-danger"> 
        <strong>Whoops!</strong> There were some problems with your input.<br><br> 
        <ul> 
            @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li> 
            @endforeach 
        </ul> 
    </div> 
    @endif 
 
    <div class="card card-warning"> 
        <div class="card-header"> 
            <h3 class="card-title">Ubah Data Penduduk</h3> 
        </div> 
        <!-- /.card-header --> 
        <!-- form start --> 
        <form action="{{ route('penduduk.update',$penduduk->id) }}" method="POST">             
            @csrf 
            @method('PUT') 
            <div class=" card-body"> 
            <div class=" card-body"> 
                <div class="form-group"> 
                    <label for="nik">NIK</label>                     
                    <input type="text" class="form-control" id="nik" name="nik" placeholder=""value="{{ old('nik', $penduduk->nik) }}"> 
                </div> 
                <div class="form-group"> 
                    <label for="nama">Nama</label> 
                    <input type="text" class="form-control" id="nama" name="nama"value="{{ old('nama', $penduduk->nama) }}">                 
                </div> 
                <div class="form-group"> 
                    <label for="jenis_kelamin">Jenis Kelamin</label> 
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"value="{{ old('jenis_kelamin', $penduduk->jenis_kelamin) }}">                 
                </div> 
                    <div class="form-group"> 
                    <label for="tanggal_lahir">Tanggal Lahir</label> 
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">                 
                </div>
                <div class="form-group"> 
                    <label for="agama">Agama</label> 
                    <input type="text" class="form-control" id="agama" name="agama"value="{{ old('agama', $penduduk->agama) }}">                 
                </div>
                <div class="form-group"> 
                    <label for="status">Status</label> 
                    <input type="text" class="form-control" id="status" name="status"value="{{ old('status', $penduduk->status) }}">                 
                </div>
                <div class="form-group"> 
                    <label for="pekerjaan">Pekerjaan</label> 
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"value="{{ old('pekerjaan', $penduduk->pekerjaan) }}">                 
                </div>
                <div class="form-group"> 
                    <label for="alamat">Alamat</label> 
                    <input type="text" class="form-control" id="alamat" name="alamat"value="{{ old('alamat', $penduduk->alamat) }}">                 
                </div>
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer"> 
                <button type="submit" class="btn btn-warning floatright">Simpan</button> 
            </div> 
        </form> 
    </div> 
</div> 
@endsection 
