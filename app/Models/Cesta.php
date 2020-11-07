<?php
namespace App\Models;
class Cesta {

    public $listadoProductos = [];
    public $cantidadProductos = [];
    public $precioTotal;

    public function addProduct($cod) {

        if (isset($this->listadoProductos["$cod"])) {
            $this->cantidadProductos["$cod"] += 1;
        } else {

            $this->listadoProductos["$cod"] = $cod;
            $this->cantidadProductos["$cod"] = 1;
        }
    }

    private function calculaTotal() {

        $total = 0;

        foreach ($this->listadoProductos as $prod) {
            $cod = $prod->getCod();
            $total += $prod->getPvp() * $this->cantidadProductos["$cod"];
        }

        $this->precioTotal = $total;
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

}

?>
