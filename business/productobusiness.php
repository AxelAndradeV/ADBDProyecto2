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

<<<<<<< HEAD
    public function insertarProducto($producto){
      
        return $this->productoData->insertarProducto($producto);
    }

=======
    public function getTotalProductosCategoria($categoriaid){
        return $this->productoData->getTotalProductosCategoria($categoriaid);
    }
>>>>>>> origin/main
    public function getPaginasProducto($inicio, $cantidad){
    	return $this->productoData->getPaginasProducto($inicio, $cantidad);
    }
    
    public function modificarProducto($producto){
        return $this->productoData->modificarProducto($producto);
    }
    public function eliminarProducto($id){
        return $this->productoData->eliminarProducto($id);
    }

    public function getPaginasProductoCategoria($inicio, $cantidad,$categoriaid){
        return $this->productoData->getPaginasProductoCategoria($inicio, $cantidad,$categoriaid);
    }

    public function getAllTBProductos(){
        return $this->productoData->getAllTBProductos();
    }

<<<<<<< HEAD
    public function getUltimoIdInsertado(){
        return $this->productoData->getUltimoIdInsertado();
    }
=======
   
>>>>>>> origin/main

}

?>