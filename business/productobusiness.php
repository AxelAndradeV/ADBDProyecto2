<?php 

if (is_file("../data/productodata.php")){
        include ("../data/productodata.php");
    }else{
        include ("../../data/productodata.php");
    }

//include '../../data/productodata.php';

class ProductoBusiness{

    private $productoData;

    public function ProductoBusiness(){
        $this->productoData = new ProductoData();
    }
    
    public function getTotalProductos(){
    	return $this->productoData->getTotalProductos();
    }

    public function getTotalProductosCategoria($categoriaid){
        return $this->productoData->getTotalProductosCategoria($categoriaid);
    }
    public function getPaginasProducto($inicio, $cantidad){
    	return $this->productoData->getPaginasProducto($inicio, $cantidad);
    }

    public function getPaginasProductoCategoria($inicio, $cantidad,$categoriaid){
        return $this->productoData->getPaginasProductoCategoria($inicio, $cantidad,$categoriaid);
    }

    public function getAllTBProductos(){
        return $this->productoData->getAllTBProductos();
    }

   

}

?>