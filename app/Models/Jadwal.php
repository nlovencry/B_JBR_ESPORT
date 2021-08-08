<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $PrimaryKey = 'id_jadwal';
    protected $fillable = ['id_game', 'id_coach','id_team', 'tanggal', 'nama_jadwal', 'waktu_mulai', 'keterangan'];
}