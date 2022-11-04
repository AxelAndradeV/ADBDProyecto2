<?php 	 
	
	include 'productobusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['productonombre'])){
			$productoBusiness = new ProductoBusiness();
			$img = "img/productos/default/anonymous.png";
			$nombre = $_POST['productonombre'];			
			$precio = $_POST['productoprecio'];
			$estado = $_POST['productoestado'];
			$categoria = $_POST['productocategoriaid'];
			$codigo = $_POST['productocodigo'];
			if(isset($_FILES["nuevaImagen"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);


				// $nuevoAncho = 160;
	   //  		$nuevoAlto = 200;
	    		$aleatorio = mt_rand(100,999);
	    		$directorio = "../view/backend/img/productos/".$codigo;
				mkdir($directorio, 0755);

				 if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){


				     $img = $directorio."/".$aleatorio.".jpg";
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
			$producto->setImagenProducto($img);	 
			$producto->setNombre($nombre);			   		    	
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
			
		}else if(isset($_POST['id'])){

			$productoid = $_POST['id'];
			$productoBusiness = new ProductoBusiness();
			$resultado = $productoBusiness->getAllTBProductos($productoid);
	
			$datos = "";
			for ($i=0; $i < count($resultado) ; $i++) { 
				$datos .= "<tr>";
				$datos .= "<td>".$resultado[$i]['productoid']."</td>";
				$datos .= "<td>".$resultado[$i]['productoimg']."</td>";
				$datos .= "<td>".$resultado[$i]['productonombre']."</td>";							
				$datos .= "<td>".$resultado[$i]['productoprecio']."</td>";
				$datos .= "<td>".$resultado[$i]['productoestado']."</td>";
				$datos .= "<td>".$resultado[$i]['productocategoria']."</td>";
				$datos .= "<td>".$resultado[$i]['productocodigo']."</td>";
				$datos .= "</tr>";
				
			}
			echo $datos;


		}
	}else if(isset($_POST['actualizar'])){
		if(isset($_POST['productoimg']) && isset($_POST['productonombre']) && isset($_POST['productoprecio'])
        && isset($_POST['productoestado']) && isset($_POST['productocategoria'])
        && isset($_POST['productoid'])){
			$productoid = $_POST['productoid'];
			
            $productonombre = $_POST['productonombre'];			
            $productoprecio = $_POST['productoprecio'];
            $productoestado = $_POST['productoestado'];
            $productocategoria = $_POST['productocategoria'];
            $productocodigo = $_POST['productocodigo'];
			
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
				$producto = new Producto($productoid,$rutaAux,$productonombre,$productoprecio,$productoestado,$productocategoria,$productocodigo);
				$producto->setIdProducto($productoid);
				$producto->setImagenProducto($rutaAux);
				$producto->setNombre($productonombre);				
                $producto->setPrecioProducto($productoprecio);
                $producto->setEstadoProducto($productoestado);
                $producto->setCategoriaProducto($productocategoria);  
				$producto->setProductocodigo($productocodigo);          

	    		$resultado = $productoBusiness->modificarProducto($producto);

	    		if($resultado == 1){
	    			header("location: ../view/backend/productoview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/backend/productoview.php?mensaje=4" );
	    		}

			}
		}


	


	}else if(isset($_GET['eliminar'])){
		$productoid = $_GET['productoid'];
		$rutaImagen = $_GET['productoimg'];
		$productonombre = $_GET['productonombre'];
		$productoprecio = $_GET['productoprecio'];
		$productoestado = $_GET['productoestado'];
		$productocategoria = $_GET['productocategoria'];
		$productocodigo = $_GET['productocodigo'];


		if($_GET["imagen"] != "" && $_GET["imagen"] != "../view/backend/img/productos/default/anonymous.png"){

				unlink("../view/backend/".$_GET["imagen"]);
				rmdir('../view/backend/img/productos/'.$_GET["codigo"]);

		}

		$productoBusiness = new ProductoBusiness();
		$resultado = $productoBusiness->eliminarProducto($id);

		if($resultado == 1){
			header("location: ../view/backend/productoview.php?mensaje=3" );
		}else{
			header("location: ../view/backend/productoview.php?mensaje=4" );
		}
	}






?>