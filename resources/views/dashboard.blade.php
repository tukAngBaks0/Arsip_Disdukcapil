@extends('layouts.template')
@section('judulh1','Admin - Dashboard')
@section('konten')
<div class="col-lg-12">
 <div class="card">
 <div class="card-header border-0">
 <div class="d-flex justify-content-between">
 <h3 class="card-title">Dashboard</h3>
 </div>
 </div>
 <div class="row">
 <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Penduduk</span>
                <span class="info-box-number">
                  {{ $penduduk }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
 <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Admin</span>
                <span class="info-box-number">
                {{ $admin }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-lg-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-export"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Dokumen</span>
                <span class="info-box-number">
                {{ $dokumen }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection