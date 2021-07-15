<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "event";

    protected $fillable = [
        'nama_event',
        'tanggal_pendaftaran',
        'tanggal_mulai',
        'tanggal_akhir',
        'price',
        'gambar',
    ];
}
