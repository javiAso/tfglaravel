<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RACE extends Model
{
    use HasFactory;
    protected $table = 'RACE';
    protected $primaryKey = 'COD_RACE';
    public $timestamps = false;
}
