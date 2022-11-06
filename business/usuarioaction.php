<?php 	 
	
	include 'usuariobusiness.php';

	if(isset($_POST['insertar'])){
		if(isset($_POST['usuarionombre'])&& isset($_POST['usuariotelefono']) && isset($_POST['usuariocorreo'])
        && isset($_POST['usuariopassword'])
        && isset($_POST['usuariotipoid'])){
			$usuarioBusiness = new UsuarioBusiness();
			$nombre = $_POST['usuarionombre'];
			$telefono = $_POST['usuariotelefono'];
            $correo = $_POST['usuariocorreo'];
            $password = $_POST['usuariopassword'];
            $tipoid = $_POST['usuariotipoid'];
			

			
	    	$usuario = new Usuario();
			$usuario->setNombre($nombre);	 
			$usuario->setTelefono($telefono);			   		    	
	    	$usuario->setCorreo($correo);
			$usuario->setPassword($password);
			$usuario->setTipoid($tipoid);
			
			
	    	$resultado = $usuarioBusiness->insertarusuario($usuario);

	    	if($resultado == 1){
	    		header("location: ../view/backend/usuarioview.php?mensaje=1" );
	    	}else{
	    		header("location: ../view/backend/usuarioview.php?mensaje=4" );
	    	}
        }
			
		
	}else if(isset($_POST['actualizar'])){
		if(isset($_POST['usuarioid']) && isset($_POST['usuarionombre']) && isset($_POST['usuariotelefono']) && isset($_POST['usuariocorreo'])
        && isset($_POST['usuariopassword']) && isset($_POST['tipoid'])){
			$id = $_POST['usuarioid'];
			$nombre = $_POST['usuarionombre'];
			$telefono = $_POST['usuariotelefono'];
            $correo = $_POST['usuariocorreo'];
            $password = $_POST['usuariopassword'];
            $tipoid = $_POST['tipoid'];
			

				$usuarioBusiness = new UsuarioBusiness();
				$usuario = new Usuario(); 
				$usuario->setId($id);
				$usuario->setNombre($nombre);
	    		$usuario->setTelefono($telefono);
                $usuario->setCorreo($correo);
                $usuario->setPassword($password);
                $usuario->setTipoid($tipoid);
				
	    		$resultado = $usuarioBusiness->modificarusuario($usuario);

	    		if($resultado == 1){
	    			header("location: ../view/backend/usuarioview.php?mensaje=2" );
	    		}else{
	    			header("location: ../view/backend/usuarioview.php?mensaje=4" );
	    		}

			}
		


	} else if(isset($_GET['eliminar'])){
		$id = $_GET['usuarioid'];
		$usuarioBusiness = new UsuarioBusiness();
		$resultado = $usuarioBusiness->eliminarusuario($id);

		if($resultado == 1){
			header("location: ../view/backend/usuarioview.php?mensaje=3" );
		}else{
			header("location: ../view/backend/usuarioview.php?mensaje=4" );
		}


	}






?>