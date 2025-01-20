@extends('layouts.template') 
@section('tambahanCSS') 
<!-- DataTables --> 
<link rel="stylesheet" href="plugins/datatablesbs4/css/dataTables.bootstrap4.min.css"> 
<link rel="stylesheet" href="plugins/datatablesresponsive/css/responsive.bootstrap4.min.css"> <link rel="stylesheet" href="plugins/datatablesbuttons/css/buttons.bootstrap4.min.css"> 
<!-- Toastr --> 
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> 
@endsection 
 
@section('judulh1','Admin - Dokumen') 
 
@section('konten') 
 
 
 
<div class="col-md-12"> 
 
    <div class="card card-info"> 
        <div class="card-header"> 
            <h2 class="card-title">Data Dokumen</h2> 
            <a type="button" class="btn btn-success float-right" href="{{ route('dokumen.create') }}"> 
                <i class=" fas fa-plus"></i> Tambah Dokumen 
            </a> 
        </div> 
        <!-- /.card-header --> 
 
        <div class="card-body"> 
            <table id="example1" class="table table-bordered table-striped "> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama Penduduk</th> 
                        <th>Admin</th> 
                        <th>KK</th> 
                        <th>Aksi</th> 
                    </tr> 
                </thead> 
                <tbody> 
 
                    @foreach($data as $dt) 
                    <tr> 
                        <td>{{ $loop->iteration }}</td> 
                        <td>{{ $dt->penduduk->nama }}</td> 
                        <td>{{ $dt->admin->nama }}</td> 
                        <td>
                        @if($dt->kk)
                        <!-- Link untuk melihat file -->
                        <a href="{{ route('dokumen.view', ['filename' => basename($dt->kk)]) }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-eye"></i> Lihat KK
                        </a>

                        <!-- Link untuk mengunduh file -->
                        <a href="{{ route('dokumen.download', ['filename' => basename($dt->kk)]) }}" class="btn btn-primary">
                            <i class="fas fa-download"></i> Unduh KK
                        </a>
                        @else
                            Tidak ada dokumen KK
                        @endif
                        </td>
                        <td> 
                            <div class="btn-group"> 
                                <form action="{{ route('dokumen.destroy',$dt->id)}}" method="POST"> 
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="btn btn-danger"> 
                                        <i class=" fas fa-trash"></i> 
                                    </button> 
 
                                </form> 
 
                                <a type="button" class="btn btn-warning" href="{{ route('dokumen.edit',$dt->id) }}"> 
                                    <i class=" fas fa-edit"></i> 
                                </a> 
                                <a type="button" class="btn btn-success" href="{{ route('dokumen.show',$dt->id) }}"> 
                                    <i class=" fas fa-eye"></i> 
                                </a> 
                            </div> 
 
 
                        </td> 
                    </tr> 
 
                    @endforeach 
                </tbody> 
            </table> 
 
        </div> 
 
 
    </div> 
</div> 
@endsection 
 
@section('tambahanJS') 
<!-- DataTables  & Plugins --> 
<script src="plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
<script src="plugins/datatablesresponsive/js/dataTables.responsive.min.js"></script> 
<script src="plugins/datatablesresponsive/js/responsive.bootstrap4.min.js"></script> 
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> 
<script src="plugins/jszip/jszip.min.js"></script> 
<script src="plugins/pdfmake/pdfmake.min.js"></script> 
<script src="plugins/pdfmake/vfs_fonts.js"></script> 
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script> 
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script> 
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script> 
<!-- Toastr --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></s cript> 
 
@endsection 
 
@section('tambahScript') 
<script> 
$(function() { 
    $("#example1").DataTable({ 
        "responsive": true, 
        "lengthChange": true, 
        "autoWidth": false, 
        "responsive": true, 
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)'); 
}); 
 
@if($message = Session::get('success')) toastr.success("{{ $message}}"); 
@elseif($message = Session::get('updated')) toastr.warning("{{ $message}}"); 
@elseif($message = Session::get('deleted')) toastr.error("{{ $message}}"); 
@endif 
</script> 
@endsection 
