<?php 

    class Producto{
        private $productoid ;
        private $productonombre;
        private $productoimg;
        private $productoprecio;
        private $productoestado;
        private $productocategoria;
        private $productocodigo;
       


       

        function __construct($id, $nombre, $img,$precio,$estado,$categoria,$codigo){

            $this->productoid = $id;
            $this->productonombre = $nombre;
            $this->productoimg = $img;
            $this->productoprecio = $precio;
            $this->productoestado = $estado;
            $this->productocategoria = $categoria;
            $this->productocodigo = $codigo;
       
        }

        function setIdProducto($id){
            $this->productoid = $id;
        }

        function getIdProducto(){
            return $this->productoid;
        }

        function setNombre($nombre){
            $this->productonombre = $nombre;
        }

        function getNombreProducto(){
            return $this->productonombre;
        }

        function setPrecioProducto($precio){
            $this->productoprecio = $precio;
        }

        function getPrecioProducto(){
            return $this->productoprecio;
        }

        function setEstadoProducto($estado){
            $this->productoestado = $estado;
        }

        function getEstadoProducto(){
            return $this->productoestado;
        }

        function setCategoriaProducto($categoria){
            $this->productocategoria = $categoria;
        }

        function getCategoriaProducto(){
            return $this->productocategoria;
        }

        function setImagenProducto($img){
            $this->productoimagen = $img;
        }

        function getImagenProducto(){
            return $this->productoimagen;
        }

    
    /**
     * @return mixed
     */
    public function getProductocodigo()
    {
        return $this->productocodigo;
    }

    /**
     * @param mixed $productocodigo
     *
     * @return self
     */
    public function setProductocodigo($productocodigo)
    {
        $this->productocodigo = $productocodigo;

        return $this;
    }
}


?>