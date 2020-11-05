<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJ extends Model
{
    use HasFactory;
    protected $table= 'PJ';
    protected $primaryKey= 'COD_PJ';
    public $timestamps = false;



}
