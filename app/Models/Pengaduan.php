<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = ['nik','isi_laporan','foto','lokasi','kategori','tgl_kejadian','tgl_pengaduan','status'];
}
