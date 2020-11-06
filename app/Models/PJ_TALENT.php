<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJ_TALENT extends Model
{
    use HasFactory;
    protected $table = 'PJ_TALENT';
    protected $primaryKey = 'COD_TALENT';
    public $timestamps = false;
}
