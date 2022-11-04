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


         public function insertarProducto($producto){
			$pdo = Database::conectar();
            $stm = $pdo->prepare("CALL insertarProducto(?,?,?,?,?,?,?)");

            $max = $pdo ->prepare("SELECT MAX(productoid) AS productoid  FROM tbproducto");
	        $max -> execute();
	        $nextId = 1;
	                
	        if($row = $max->fetch()){
	           $nextId = $row[0]+1;
	        }
	        
	        $nombre = $producto->getNombreProducto();
	        $img = $producto->getImagenProducto();
            $precio = $producto->getPrecioProducto();
            $estado = $producto->getEstadoProducto();
            $categoria = $producto->getCategoriaProducto();
            $codigo = $producto->getProductocodigo();
            $stm ->bindParam(1,$nextId,PDO::PARAM_INT);
            $stm ->bindParam(2,$nombre,PDO::PARAM_STR);
            $stm ->bindParam(3,$img,PDO::PARAM_STR);
            $stm ->bindParam(4,$precio,PDO::PARAM_STR);
            $stm ->bindParam(5,$estado,PDO::PARAM_STR);
            $stm ->bindParam(6,$categoria,PDO::PARAM_STR);
            $stm ->bindParam(7,$codigo,PDO::PARAM_INT);
            $resultado = $stm->execute();
            Database::desconectar();
	           
	        return $resultado;
		}

        public function eliminarProducto($id){
            $pdo = Database::conectar();
            $stm = $pdo->prepare("CALL eliminarProducto(?)");
            $stm ->bindParam(1,$id,PDO::PARAM_INT);
            $resultado = $stm->execute();
            Database::desconectar();
               
            return $resultado;

        }

        public function getUltimoIdInsertado(){
        	$pdo = Database::conectar();
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $stmt = $pdo ->prepare("SELECT MAX(productoid) AS productoid  FROM tbproducto");
	        $stmt -> execute();
	        $nextId = 1;
	                
	        if($row = $stmt->fetch()){
	           $nextId = $row[0]+1;
	        }

	        return $nextId;
        }

        public function eliminar($id){
            $pdo = Database::conectar();
            $stm = $pdo->prepare("CALL eliminarProducto(?)");
            $stm ->bindParam(1,$id,PDO::PARAM_INT);
            $resultado = $stm->execute();
            Database::desconectar();
               
            return $resultado;

        }


    }
?>