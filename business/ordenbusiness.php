<?php 


if (is_file("../data/ordendata.php")){
	include ("../data/ordendata.php");
}else{
	include ("../../data/ordendata.php");
}

//include '../data/ordendata.php';

class OrdenBusiness{

	private $ordenData;

	public function OrdenBusiness(){
		$this->ordenData = new OrdenData();
	}

	public function insertarTBOrden($orden){
		return $this->ordenData->insertarTBOrden($orden);
	}

	public function insertarTBDetalle($detalle){
		return $this->ordenData->insertarTBDetalle($detalle);	
	}

	public function modificarOrden($ordenid,$ordenestado){
		return $this->ordenData->modificarOrden($ordenid,$ordenestado);		
	}

	public function eliminarOrden($id){
		return $this->ordenData->eliminarOrden($id);	
	}

	public function getUltimoIdOrden(){
		return $this->ordenData->getUltimoIdInsertado();
	}


	public function getAllTBOrdenes(){
		return $this->ordenData->getAllTBOrdenes();
	}

	public function getAllTBDetalles($ordenid){
		return $this->ordenData->getAllTBDetalles($ordenid);
	}

}


 ?>