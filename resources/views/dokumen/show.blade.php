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
 
    <div class="card card-primary"> 
        <div class="card-header"> 
            <h3 class="card-title">Data Dokumen</h3> 
        </div> 
        <!-- /.card-header --> 
 
 
        <div class=" card-body"> 
            <table> 
                <tr> 
                    <th>Nama Penduduk</th> 
                    <td>:</td> 
                    <td>{{ $data[0]->penduduk->nama }}</td> 
                </tr> 
                <tr> 
                    <th>Admin</th> 
                    <td>:</td> 
                    <td>{{ $data[0]->admin->nama }}</td> 
                </tr> 
                <tr> 
                    <th>KK</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->kk)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->kk)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat KK
                        </a>
                        @endif
                    </td>
                </tr> 

                <tr> 
                    <th>KTP</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->ktp)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->ktp)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat KTP
                        </a>
                        @endif
                    </td>
                </tr> 

                <tr> 
                    <th>KIA</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->kia)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->kia)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat KIA
                        </a>
                        @endif
                    </td>
                </tr> 

                <tr> 
                    <th>Surat Pindah</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->surat_pindah)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->surat_pindah)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat Surat Pindah
                        </a>
                        @endif
                    </td>
                </tr> 

                <tr> 
                    <th>Surat Kehilangan</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->surat_kehilangan)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->surat_kehilangan)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat Surat Kehilangan
                        </a>
                        @endif
                    </td>
                </tr> 

                <tr> 
                    <th>Akta Kelahiran</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->akta_kelahiran)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->akta_kelahiran)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat Akta Kelahiran
                        </a>
                        @endif
                    </td>
                </tr>
                
                <tr> 
                    <th>Akta Kematian</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->akta_kematian)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->akta_kematian)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat Akta Kematian
                        </a>
                        @endif
                    </td>
                </tr> 

                <tr> 
                    <th>Akta Perkawinan</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->akta_perkawinan)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->akta_perkawinan)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat Akta Perkawinan
                        </a>
                        @endif
                    </td>
                </tr>
                
                <tr> 
                    <th>Akta Perceraian</th> 
                    <td>:</td> 
                    <td>
                        @if($data[0]->akta_perceraian)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($data[0]->akta_perceraian)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat Akta Perceraian
                        </a>
                        @endif
                    </td>
                </tr> 
            </table> 
        </div> 
        <!-- /.card-body --> 
 
    </div> 
</div> 
@endsection
