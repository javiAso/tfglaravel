<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carroCompra extends Model
{
    use HasFactory;

    public $carro = [];

    public static function add($itemID){

        $carro[] = $itemID;

    }

    public static function all(){

    return 1;

}
}
