<?php
namespace App\Models;
use App\Models\Equipment;

class Cesta {

    public $listadoProductos = [];
    public $cantidadProductos = [];
    public $precioTotal;

    public function addProduct(Equipment $equipment) {
        $cod = $equipment->COD_EQUIPMENT;
        //echo $equipment->PRICE;
        if (isset($this->listadoProductos["$cod"])) {
            $this->cantidadProductos["$cod"] += 1;
        } else {

            $this->listadoProductos["$cod"] = $equipment;
            $this->cantidadProductos["$cod"] = 1;
        }
    }

    private function calculaTotal() {

        $totalCobre=0;

        foreach ($this->listadoProductos as $cod => $equipment) {

            $totalCobre += $this->conversorCobre($equipment->PRICE,$this->cantidadProductos["$cod"]);


        }
        $this->precioTotal = $this->conversorTotal($totalCobre);
    }

    public function getPrecioTotal() {

        $this->calculaTotal();
        return $this->precioTotal;
    }

    public function getListadoProductos() {

        return $this->listadoProductos;
    }

    public function getCantidadProductos() {

        return $this->cantidadProductos;
    }

    public function conversorCobre($price,$cantidad){

        //recibo una cadena con el precio y el tipo de moneda

        $moneda = explode(' ',$price)[1];

        echo 'tipo moneda: '.$moneda. 'a<br>';
        switch ($moneda) {
            case 'mc':
                return intval(explode(' ',$price)[0]) * $cantidad;


            case 'mp':
                return intval(explode(' ',$price)[0]) * 10 * $cantidad;

            default:
            return intval(explode(' ',$price)[0]) * 100 * $cantidad;
        }


    }

    public function conversorTotal($totalCobre){
        echo $totalCobre;
        $mo = $totalCobre/100;
        $mp = ($totalCobre%100)/10;
        $mc = ($totalCobre%100)%10;

        return "mo ".floor($mo)." mp ".floor($mp)." mc ".$mc;


    }

}
