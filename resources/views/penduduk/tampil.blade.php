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
 
    <div class="card card-secondary"> 
        <div class="card-header"> 
            <h3 class="card-title">Data Penduduk</h3> 
        </div> 
        <!-- /.card-header --> 
        <!-- form start --> 
        <form method=" POST"> 
            @csrf 
            @method('PUT') 
            <div class=" card-body"> 
                <div class="form-group"> 
                    <label for="nik">NIK</label>                     
                    <input type="text" class="form-control" id="nik" name="nik" placeholder=""                         
                    value="{{ $penduduk->nik }}" disabled> 
                </div> 
                <div class="form-group"> 
                    <label for="nama">Nama</label> 
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $penduduk->nama }}" disabled> 
                </div> 
                <div class="form-group"> 
                    <label for="jenis_kelamin">Jenis Kelamin</label> 
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $penduduk->jenis_kelamin }}"disabled> 
                </div> 
                <div class="form-group"> 
                    <label for="tanggal_lahir">Tanggal Lahir</label> 
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}"disabled> 
                </div>
                <div class="form-group"> 
                    <label for="agama">Agama</label> 
                    <input type="text" class="form-control" id="agama" name="agama" value="{{ $penduduk->agama }}"disabled> 
                </div>
                <div class="form-group"> 
                    <label for="status">Status</label> 
                    <input type="text" class="form-control" id="status" name="status" value="{{ $penduduk->status }}"disabled> 
                </div>
                <div class="form-group"> 
                    <label for="pekerjaan">Pekerjaan</label> 
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $penduduk->pekerjaan }}"disabled> 
                </div>
                <div class="form-group"> 
                    <label for="alamat">Alamat</label> 
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $penduduk->alamat }}"disabled> 
                </div>
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer"> 
 
            </div> 
        </form> 
    </div> 
</div> 
@endsection
