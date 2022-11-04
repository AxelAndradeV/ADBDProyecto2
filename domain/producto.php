<?php 

    class Producto{
        private $productoid ;
        private $productonombre;
        private $productoimg;
        private $productoprecio;
        private $productoestado;
        private $productocategoria;
        private $productocodigo;
       



        function setIdProducto($productoid){
            $this->productoid = $productoid;
        }

        function getIdProducto(){
            return $this->productoid;
        }

        function setNombre($productonombre){
            $this->productonombre = $productonombre;
        }

        function getNombreProducto(){
            return $this->productonombre;
        }

        function setPrecioProducto($productoprecio){
            $this->productoprecio = $productoprecio;
        }

        function getPrecioProducto(){
            return $this->productoprecio;
        }

        function setEstadoProducto($productoestado){
            $this->productoestado = $productoestado;
        }

        function getEstadoProducto(){
            return $this->productoestado;
        }

        function setCategoriaProducto($productocategoria){
            $this->productocategoria = $productocategoria;
        }

        function getCategoriaProducto(){
            return $this->productocategoria;
        }

        function setImagenProducto($productoimg){
            $this->productoimagen = $productoimg;
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