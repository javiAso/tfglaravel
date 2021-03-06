<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Cesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EquipmentController extends Controller


{

    public function store()
    {
        session_start();
        session(['cesta' => new Cesta]);
        return $this->showStore();


    }

    public function addItem(Request $request){

        if($request->emptyCart!=null){
             return $this->emptyCart();
        }
        //$this->cesta["$request->itemID"] = $request->itemID;
        session_start();
        //if (isEmpty(session('cesta'))) session('cesta', new Cesta);

        $equipment = Equipment::where('COD_EQUIPMENT',$request->itemID)->first();

        session('cesta')->addProduct($equipment);


        return $this->showStore();


    }

    public function emptyCart(){

        session('cesta')->emptyCart();
        return $this->showStore();
    }

    public function showStore(){

        $items = DB::select('SELECT * FROM EQUIPMENT WHERE COD_EQUIPMENT NOT IN (SELECT COD_EQUIPMENT FROM WEAPON) AND COD_EQUIPMENT NOT IN (SELECT COD_EQUIPMENT FROM ARMOR);');
        $armors = DB::select('SELECT EQUIPMENT.COD_EQUIPMENT,EQUIPMENT.NAME, EQUIPMENT.PRICE, ARMOR.DEFENSE FROM (EQUIPMENT INNER JOIN ARMOR ON EQUIPMENT.COD_EQUIPMENT = ARMOR.COD_EQUIPMENT);');
        $weaponsM = DB::select('SELECT EQUIPMENT.COD_EQUIPMENT,EQUIPMENT.NAME, EQUIPMENT.PRICE, WEAPON.DAMAGE FROM (EQUIPMENT INNER JOIN WEAPON ON EQUIPMENT.COD_EQUIPMENT = WEAPON.COD_EQUIPMENT);');
        $weaponsR = DB::select('SELECT EQUIPMENT.COD_EQUIPMENT,EQUIPMENT.NAME, EQUIPMENT.PRICE, WEAPON.DAMAGE, RANGED.RANG, RANGED.SHOTS FROM ((EQUIPMENT INNER JOIN WEAPON ON EQUIPMENT.COD_EQUIPMENT = WEAPON.COD_EQUIPMENT) INNER JOIN RANGED ON RANGED.COD_EQUIPMENT = EQUIPMENT.COD_EQUIPMENT);');
        $buyedItems = session('cesta')->getListadoProductos();
        $totalItems = session('cesta')->getCantidadProductos();
        $total = session('cesta')->getPrecioTotal();

        return view('equipment', ['items' => $items , 'armors' => $armors , 'weaponsM' => $weaponsM , 'weaponsR' => $weaponsR , 'buyedItems' => $buyedItems , 'totalItems' => $totalItems , 'total' => $total]);

    }

}
