<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TALENT extends Model
{
    use HasFactory;
    protected $table = 'TALENT';
    protected $primaryKey = 'COD_TALENT';
    public $timestamps = false;
}
