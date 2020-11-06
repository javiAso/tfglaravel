<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PJ extends Model
{
    use HasFactory;
    protected $table = 'PJ';
    protected $primaryKey = 'COD_PJ';
    public $timestamps = false;



    public function calculateMod($attribute)
    {

        switch ($attribute) {
            case '3':
                return -2;
            case '4':
            case '5':
            case '6':
                return -1;
            case '15':
            case '17':
            case '16':
                return 1;
            case '18':
                return 2;
            default:
                return 0;
        }
    }

    public function calculatePV($DA, $con, $lvl)
    {

        $initialPV=$this->calculateMod($con) + intval(substr($DA, 2));

        if ($lvl == 1) {
            return $initialPV;
        }

        return $initialPV + ($initialPV*$lvl/2);

    }

    public function calculateDefense($des)
    {


        return $this->calculateMod($des) + 10;
    }

    public function calculatePower($int, $modLvl)
    {


        return $this->calculateMod($int) + $modLvl;
    }
}
