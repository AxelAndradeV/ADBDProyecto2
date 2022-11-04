<?php 	 
	
	include 'productobusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['productonombre'])){
			$productoBusiness = new ProductoBusiness();
			$productonombre = $_POST['productonombre'];
			$ruta = "img/productos/default/anonymous.png";
			$codigo = $productoBusiness->getUltimoIdInsertado()+11;
			if(isset($_FILES["nuevaImagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);


				// $nuevoAncho = 160;
	   //  		$nuevoAlto = 200;
	    		$aleatorio = mt_rand(100,999);
	    		$directorio = "../view/backend/img/productos/".$codigo;
				mkdir($directorio, 0755);

				 if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){


				     $ruta = $directorio."/".$aleatorio.".jpg";
				     $rutaAux = "img/productos/".$codigo."/".$aleatorio.".jpg";
				     $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);      

				     $destino = imagecreatetruecolor(160, 160);

				     imagecopyresized($destino, $origen, 0, 0, 0, 0, 160, 160, $ancho, $alto);

				     imagejpeg($destino, $ruta);

			    }

			    if($_FILES["nuevaImagen"]["type"] == "image/png"){


				     $ruta = $directorio."/".$aleatorio.".png";
				     $rutaAux = "img/productos/".$codigo."/".$aleatorio.".png";

				     $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);      

				     $destino = imagecreatetruecolor(160, 160);

				     imagecopyresized($destino, $origen, 0, 0, 0, 0,160, 160, $ancho, $alto);

				     imagepng($destino, $ruta);

	    		}

	    		
			}

			
	    	$producto = new Producto();
	    	$producto->setNombre($nombre);
	    	$producto->setImagenProducto($rutaAux);
	    	$producto->setPrecioProducto($precio);
			$producto->setEstadoProducto($estado);
			$producto->setCategoriaProducto($categoria);
			$producto->setProductocodigo($codigo);
			
	    	$resultado = $productoBusiness->insertarProducto($producto);

	    	if($resultado == 1){
	    		header("location: ../view/backend/productoview.php?mensaje=1" );
	    	}else{
	    		header("location: ../view/backend/productoview.php?mensaje=4" );
	    	}
			


		}
	}else if(isset($_POST['actualizar'])){
		if(isset($_POST['productoid']) && isset($_POST['productonombre']) && isset($_POST['productoprecio'])
        && isset($_POST['productoestado']) && isset($_POST['productocategoria']) && isset($_POST['productocodigo'])
        && isset($_POST['productoimagen'])){
			$productoid = $_POST['productoid'];
            $productonombre = $_POST['productonombre'];
            $productoprecio = $_POST['productoprecio'];
            $productoestado = $_POST['productoestado'];
            $productocategoria = $_POST['productocategoria'];
            $productocodigo = $_POST['productocodigo'];
			$productoimagen = $_POST['productoimagen'];
			$ruta = $_POST["imagenActual"];
			if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){
				
				list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
				$directorio = "../view/backend/img/productos/".$_POST["productocodigo"];

				if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "../view/backend/img/productos/default/anonymous.png"){

						unlink("../view/backend/".$_POST["imagenActual"]);

				}else{

						mkdir($directorio, 0755);	
					
				}

				if($_FILES["editarImagen"]["type"] == "image/jpeg"){

						

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";
				     	$rutaAux = "img/productos/".$_POST["productocodigo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor(160, 160);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, 160, 160, $ancho, $alto);

						imagejpeg($destino, $ruta);

				}

				if($_FILES["editarImagen"]["type"] == "image/png"){

						

						$aleatorio = mt_rand(100,999);

						$ruta = $directorio."/".$aleatorio.".jpg";
				     	$rutaAux = "img/productos/".$_POST["productocodigo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor(160, 160);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, 160, 160, $ancho, $alto);

						imagepng($destino, $ruta);

				}

				$productoBusiness = new ProductoBusiness();
				$producto = new Producto($id,$nombre,$precio,$estado,$categoria,$codigo,$rutaAux);
				$producto->setIdProducto($id);
				$producto->setNombre($nombre);
                $producto->setPrecioProducto($precio);
                $producto->setEstadoProducto($estado);
                $producto->setCategoriaProducto($categoria);  
                $producto->setProductocodigo($codigo);             
	    		$producto->setImagenProducto($imagen);
	    		$resultado = $productoBusiness->modificarProducto($producto);

	    		if($resultado == 1){
	    			header("location: ../view/backend/productoview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/backend/productoview.php?mensaje=4" );
	    		}

			}
		}


	


	}






?>