<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $PrimaryKey = 'id_event';
    protected $fillable = ['nama_event', 'keterangan', 'gambar', 'tgl_mulai_pendaftaran', 'tgl_akhir_pendaftaran','tanggal_mulai', 'tanggal_akhir','slot', 'price'];
}
?>