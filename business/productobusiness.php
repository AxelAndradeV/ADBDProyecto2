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

    public function insertarProducto($producto){
        return $this->productoData->insertarProducto($producto);
    }

    public function getPaginasProducto($inicio, $cantidad){
    	return $this->productoData->getPaginasProducto($inicio, $cantidad);
    }
    
    public function modificarProducto($producto){
        return $this->productoData->modificarProducto($producto);
    }
    public function eliminarProducto($id){
        return $this->productoData->eliminarProducto($id);
    }

    public function getAllTBProductos(){
        return $this->productoData->getAllTBProductos();
    }

    public function getUltimoIdInsertado(){
        return $this->productoData->getUltimoIdInsertado();
    }

}

?>