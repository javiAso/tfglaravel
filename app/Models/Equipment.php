<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'EQUIPMENT';
    protected $primaryKey = 'COD_EQUIPMENT';
    public $timestamps = false;


}
