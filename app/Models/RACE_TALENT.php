<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RACE_TALENT extends Model
{
    use HasFactory;
    protected $table = 'RACE_TALENT';
    protected $primaryKey = 'COD_RACE';
    public $timestamps = false;
}
