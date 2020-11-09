<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJ_EQUIPMENT extends Model
{
    use HasFactory;
    protected $table = 'PJ_EQUIPMENT';
    protected $primaryKey = 'COD_EQUIPMENT';
    public $timestamps = false;
}
