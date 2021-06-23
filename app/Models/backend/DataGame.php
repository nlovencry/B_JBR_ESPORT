<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGame extends Model
{
    protected $table = 'game';
    protected $primaryKey = 'id_game';
    protected $fillable = [
        'nama_game', 'keterangan',
    ];
}
