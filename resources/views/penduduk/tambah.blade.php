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
 
    <div class="card card-success"> 
        <div class="card-header"> 
            <h3 class="card-title">Tambah Data Penduduk</h3> 
        </div> 
        <!-- /.card-header --> 
        <!-- form start --> 
        <form action="{{ route('penduduk.store') }}" method="POST"> 
            @csrf 
 
            <div class=" card-body"> 
                <div class="form-group"> 
                    <label for="nik">NIK</label>                     
                    <input type="text" class="form-control" id="nik" name="nik" placeholder=""> 
                </div> 
                <div class="form-group"> 
                    <label for="nama">Nama</label> 
                    <input type="text" class="form-control" id="nama" name="nama">                 
                </div> 
                <div class="form-group"> 
                    <label for="jenis_kelamin">Jenis Kelamin</label> 
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">                 
                </div> 
                    <div class="form-group"> 
                    <label for="tanggal_lahir">Tanggal Lahir</label> 
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">                 
                </div>
                <div class="form-group"> 
                    <label for="agama">Agama</label> 
                    <input type="text" class="form-control" id="agama" name="agama">                 
                </div>
                <div class="form-group"> 
                    <label for="status">Status</label> 
                    <input type="text" class="form-control" id="status" name="status">                 
                </div>
                <div class="form-group"> 
                    <label for="pekerjaan">Pekerjaan</label> 
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">                 
                </div>
                <div class="form-group"> 
                    <label for="alamat">Alamat</label> 
                    <input type="text" class="form-control" id="alamat" name="alamat">                 
                </div>
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer"> 
                <button type="submit" class="btn btn-success floatright">Simpan</button> 
            </div> 
        </form> 
    </div> 
</div> 
@endsection
