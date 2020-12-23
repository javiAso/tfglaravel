<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'GAME';
    protected $primaryKey = 'COD_GAME';
    public $timestamps = false;
}
