<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADVLVL extends Model
{
    use HasFactory;
    protected $table = 'ADVLVL';
    protected $primaryKey = 'COD_ADVLVL';
    public $timestamps = false;
}
