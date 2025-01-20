<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable=['penduduk_id','admin_id','kk','ktp','kia','surat_pindah','surat_kehilangan','akta_kelahiran',
    'akta_kematian','akta_perkawinan','akta_perceraian'];

    // Di Model Dokumen
public function penduduk() {
    return $this->belongsTo(Penduduk::class);
}

public function admin() {
    return $this->belongsTo(Admin::class);
}



}
