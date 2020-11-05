<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function index()
    {
        $weapon = Weapon::all();


        return view('weapon', ['weapon' => $weapon]);

    }
}
