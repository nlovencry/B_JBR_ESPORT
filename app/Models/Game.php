<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = "game";

    protected $fillable = [
        'nama_game',
        'keterangan',
    ];
}
