<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        //$equipment = DB::table('EQUIPMENT')->get();
        $equipment = Equipment::all();
        //echo $equipment;

        return view('equipment', ['equipment' => $equipment]);

    }
}
