<?php
    include_once 'data.php';
    if (is_file("../domain/producto.php")){
        include ("../domain/producto.php");
    }else{
        include ("../../domain/producto.php");
    }
	//include '../../domain/producto.php';

	class ProductoData extends Database{

        public function __construct(){}

        public function getTotalProductos(){
            $pdo = Database::conectar();
            $stm = $pdo->prepare("SELECT * FROM tbproducto ");
            $stm->execute();
            
            Database::desconectar();
            return $stm->rowCount();
        }

        public function getPaginasProducto($inicio, $cantidad){
            $pdo = Database::conectar();
            $stm = $pdo->prepare("CALL obtenerPaginasProducto(?,?)");
            $stm ->bindParam(1,$inicio,PDO::PARAM_INT);
            $stm ->bindParam(2,$cantidad,PDO::PARAM_INT);
            $stm->execute();
            Database::desconectar();
            return $stm->fetchAll(PDO::FETCH_ASSOC);

        }

        public function getAllTBProductos() {
            $pdo = Database::conectar();
            $stm = $pdo->prepare("SELECT * FROM tbproducto");
            $stm->execute();
            Database::desconectar();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
         }

<<<<<<< HEAD
         public function insertarProducto($producto){
			$pdo = Database::conectar();
            $stm = $pdo->prepare("CALL insertarProducto(?,?,?,?,?,?)");

            $max = $pdo ->prepare("SELECT MAX(productoid) AS productoid  FROM tbproducto");
	        $max -> execute();
	        $nextId = 1;
	                
	        if($row = $max->fetch()){
	           $nextId = $row[0]+1;
	        }
	        $productonombre = $producto->getNombreProducto();
	        $productoprecio = $producto->getPrecioProducto();
	        $productoestado = $producto->getEstadoProducto();
            $productocategoria = $producto->getCategoria();
            $productocodigo = $producto->getProductocodigo();
            $productoimagen = $producto->getImagen();
            $stm ->bindParam(1,$nextId,PDO::PARAM_INT);
            $stm ->bindParam(2,$productonombre,PDO::PARAM_STR);
            $stm ->bindParam(2,$productoprecio,PDO::PARAM_STR);
            $stm ->bindParam(2,$productoestado,PDO::PARAM_STR);
            $stm ->bindParam(3,$productocodigo,PDO::PARAM_STR);
            $stm ->bindParam(4,$productoimagen,PDO::PARAM_INT);
            $resultado = $stm->execute();
            Database::desconectar();
	           
	        return $resultado;
		}
=======
        public function eliminarCategoria($id){
            $pdo = Database::conectar();
            $stm = $pdo->prepare("CALL eliminarCategoria(?)");
            $stm ->bindParam(1,$id,PDO::PARAM_INT);
            $resultado = $stm->execute();
            Database::desconectar();
               
            return $resultado;

        }

        public function eliminar($id){
            $pdo = Database::conectar();
            $stm = $pdo->prepare("CALL eliminarCategoria(?)");
            $stm ->bindParam(1,$id,PDO::PARAM_INT);
            $resultado = $stm->execute();
            Database::desconectar();
               
            return $resultado;

        }
>>>>>>> origin/main

    }
?>