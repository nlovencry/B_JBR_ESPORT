<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $PrimaryKey = 'id_jadwal';
    protected $fillable = ['id_game', 'id_coach', 'tanggal', 'nama_jadwal', 'waktu_mulai', 'keterangan'];
}