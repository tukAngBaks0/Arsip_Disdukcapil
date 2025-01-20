@extends('layouts.template') 
@section('judulh1','Admin - Dokumen') 
 
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
            <h3 class="card-title">Tambah Data Dokumen</h3> 
        </div> 
        <!-- /.card-header --> 

        <!-- form start -->         
         <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data"> 
            @csrf 
 
            <div class=" card-body"> 
                <div class="form-group"> 
                    <label for="penduduk_id" class="form-label">Nama Penduduk</label>
                    <select class="form-control" name="penduduk_id" id="penduduk_id">
                        <option hidden>--Pilih Penduduk--</option>
                        @foreach($penduduk as $dt)
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                    @error('penduduk_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
 
                <div class="form-group"> 
                    <label for="admin_id" class="form-label">Nama Admin</label>
                    <select class="form-control" name="admin_id" id="admin_id">
                        <option hidden>--Pilih Admin--</option>
                        @foreach($admin as $dt)
                        <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                        @endforeach
                    </select>
                    @error('admin_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group"> 
                    <label for="kk">KK</label> 
                    <input type="file" class="form-control" id="kk" name="kk"> 
                    @error('kk')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="ktp">KTP</label> 
                    <input type="file" class="form-control" id="ktp" name="ktp"> 
                    @error('ktp')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="kia">KIA</label> 
                    <input type="file" class="form-control" id="kia" name="kia"> 
                    @error('kia')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="surat_pindah">Surat Pindah</label> 
                    <input type="file" class="form-control" id="surat_pindah" name="surat_pindah"> 
                    @error('surat_pindah')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="surat_kehilangan">Surat Kehilangan</label> 
                    <input type="file" class="form-control" id="surat_kehilangan" name="surat_kehilangan"> 
                    @error('surat_kehilangan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="akta_kelahiran">Akta Kelahiran</label> 
                    <input type="file" class="form-control" id="akta_kelahiran" name="akta_kelahiran"> 
                    @error('akta_kelahiran')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="akta_kematian">Akta Kematian</label> 
                    <input type="file" class="form-control" id="akta_kematian" name="akta_kematian"> 
                    @error('akta_kematian')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="akta_perkawinan">Akta Perkawinan</label> 
                    <input type="file" class="form-control" id="akta_perkawinan" name="akta_perkawinan"> 
                    @error('akta_perkawinan')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 

                <div class="form-group"> 
                    <label for="akta_perceraian">Akta Perceraian</label> 
                    <input type="file" class="form-control" id="akta_perceraian" name="akta_perceraian"> 
                    @error('akta_perceraian')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> 
            </div> 
            <!-- /.card-body --> 
 
            <div class="card-footer"> 
                <button type="submit" 	class="btn 	btn-success 	float-right">Simpan</button> 
            </div> 
        </form> 
    </div> 
</div> 
@endsection 	
