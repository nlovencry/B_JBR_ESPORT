<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = "team";
    protected $PrimaryKey = 'id_team';
    protected $fillable = ['id_coach','id_game','nama_team',];
}
?>