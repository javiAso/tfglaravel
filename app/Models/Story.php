<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $table = 'STORY';
    protected $primaryKey = 'COD_STORY';
    public $timestamps = false;
}
