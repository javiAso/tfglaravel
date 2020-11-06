<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLASS_TALENT extends Model
{
    use HasFactory;
    protected $table = 'CLASS_TALENT';
    protected $primaryKey = 'COD_CLASS';
    public $timestamps = false;
}
