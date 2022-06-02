<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< Updated upstream
class Jadwal extends Model
=======
class Event extends Model
>>>>>>> Stashed changes
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $PrimaryKey = 'id_jadwal';
<<<<<<< Updated upstream
    protected $fillable = ['id_game', 'id_coach','id_team', 'tanggal', 'nama_jadwal', 'waktu_mulai', 'keterangan'];
=======
    protected $fillable = ['id_game', 'id_coach', 'tanggal', 'nama_jadwal', 'waktu_mulai', 'keterangan'];
>>>>>>> Stashed changes
}